<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;
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

        Mail::to($request->email)->send(new AccountCreated($user, $password_plain));
        
        session()->flash('success', 'Membership successfully created.');
        return redirect('admin/create');
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
