<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\AccountCreated;
use App\Mail\Broadcast;
use App\Mail\NewRole;
use App\Mail\PasswordReset;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function create()
    {
        return view('admin.create');
    }
    
    public function show_broadcast()
    {
        return view('admin.broadcast');
    }

    public function send_broadcast(Request $request)
    {
        $this->validate($request, [
            'recipient' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if($request->recipient == 'staff') {
            $recipients = User::whereNotNull('role')->pluck('email');
        } elseif($request->recipient == 'all') {
            $recipients = User::pluck('staff_email');
        } else {
            session()->flash('danger', 'An error occurred while fetching recipients.');
            return redirect('admin/broadcast');
        }

        Mail::to('noreply@ahscpc.org')->bcc($recipients)->send(new Broadcast($request->subject, $request->message, Auth::user()->name));

        session()->flash('success', 'Email broadcast successfully sent.');
        return redirect('admin/broadcast');
    }
    
    public function store(Request $request)
    {
        $password_plain = substr(md5(rand()), 0, 7);
        $password = bcrypt($password_plain);
        
        $user = new User();
        $user->student_id = $request->sid;
        $user->fname = ucfirst(strtolower($request->fname));
        $user->lname = ucfirst(strtolower($request->lname));
        $user->email = $request->email;
        $user->password = $password;
        $user->save();
        
        
        DB::connection('mysql_talk')->table('users')
            ->insert(
                [
                    'username' => $user->fname . $user->lname,
                    'email' => $user->email,
                    'is_activated' => 1,
                    'password' => $password
                ]
            );

        Mail::to($request->email)->send(new AccountCreated($user, $password_plain));
        
        session()->flash('success', 'Membership successfully created.');
        return redirect('admin/create');
    }
    
    public function resetPassword($id)
    {
        $password_plain = substr(md5(rand()), 0, 7);
        $password = bcrypt($password_plain);
        
        $user = User::where('id', $id)->first();
        $user->password = $password;
        $user->remember_token = null;
        $user->save();
        
        DB::table('sessions')->where('user_id', $id)->truncate();

        Mail::to($user->email)->send(new PasswordReset($user, $password_plain));
        
        session()->flash('success', 'Password successfully reset.');
        return redirect('admin/member/' . $id);
    }

    public function member()
    {
        return view('admin.member');
    }
    
    public function getAccount(Request $request)
    {
        $user = User::where('student_id', $request->sid)->first();
        return redirect('admin/member/' . $user->id);
    }
    
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.show', compact('user'));
    }
    
    public function updateRoles(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $changer = Auth::user()->name;
        
        if($user->role != $request->role && $request->role != '')
        {
           $role = $request->role;
           Mail::to($user->email)->cc('morganchasea@gmail.com')->send(new NewRole($user, $changer, $role));
        }
        
        User::where('id', $id)
            ->update(
                [
                    'admin' => $request->admin,
                    'role' => $request->role
                ]
            );
        
        session()->flash('success', 'Member roles updated successfully.');
        return redirect('admin/member/' . $id);
    }
}
