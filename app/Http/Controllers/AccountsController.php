<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\Joined;
use App\User;

class AccountsController extends Controller
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

    public function join_view()
    {
        return view('pages.join');
    }

    public function create(Request $request)
    {
        $users = User::get();
        foreach ($users as $result)
        {
            if($request->email == $result->email)
            {
                session()->flash('danger', 'You are already a club member.');
                return redirect('/');
            }
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = new User();
        $user->student_id = $request->sid;
        $user->fname = ucfirst(strtolower($request->fname));
        $user->lname = ucfirst(strtolower($request->lname));
        $user->email = $request->email;
        $user->ip = $ip;
        $user->password = bcrypt($request->password);
        $user->save();

        $password_plain = substr(md5(rand()), 0, 7);
        $password = bcrypt($password_plain);

        DB::connection('mysql_talk')->table('users')
            ->insert(
                [
                    'username' => $user->fname . $user->lname,
                    'email' => $user->email,
                    'is_activated' => 1,
                    'password' => $password
                ]
            );

        Mail::to($request->email)->send(new Joined($user, $password_plain));
        
        $newUser = User::where('ip', $ip)->where('email', $request->email)->first();

        $newUser = User::find($newUser->id);
        
        Auth::login($newUser, 1);
        
        return redirect('/dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function members()
    {
        $advisors = User::where('role', 'Advisor')->get();
        $presidents = User::where('role', 'President')->get();
        $vice_presidents = User::where('role', 'Vice President')->get();
        $treasurers = User::where('role', 'Treasurer')->get();
        $secretaries = User::where('role', 'Secretary')->get();
        $members = User::whereNull('role')->get();
        return view('members.index', compact('advisors','presidents', 'vice_presidents', 'treasurers', 'secretaries', 'members'));
    }
    
    public function management()
    {
        $advisors = User::where('role', 'Advisor')->get();
        $presidents = User::where('role', 'President')->get();
        $vice_presidents = User::where('role', 'Vice President')->get();
        $treasurers = User::where('role', 'Treasurer')->get();
        $secretaries = User::where('role', 'Secretary')->get();
        return view('pages.management', compact('advisors','presidents', 'vice_presidents', 'treasurers', 'secretaries'));
    }

    public function edit()
    {
        return view('dashboard.edit');
    }

    public function editProfile(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'image|nullable',
            'biography' => 'string|nullable'
        ]);

        $user = User::where('id', $id)->first();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(150, 150)->save(public_path('avatars/' . $filename));
            $user->avatar = $filename;
        }

        $user->biography = $request->biography;
        $user->save();

        session()->flash('success', 'Successfully updated profile.');
        return redirect('dashboard/edit');
    }

    public function password()
    {
        return view('dashboard.password');
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password1' => 'required',
            'password2' => 'required'
        ]);

        if($request->password1 != $request->password2) /** Do the passwords match? */
        {
            session()->flash('danger', 'Your passwords do not match. Try again.');
            return redirect('dashboard/password');
        } elseif(strlen($request->password1) < 8) { /** Is the password at least 8 characters? */
            session()->flash('danger', 'Your password is too short. It must be at least 8 characters.');
            return redirect('dashboard/password');
        }

        /**
         * Create user object and save the new password
         */
        $user = User::where('id', $id)->first();
        $user->password = bcrypt($request->password1);
        $user->save();

        /**
         * Return success message and redirect to dashboard
         */
        session()->flash('success', 'Your password was updated successfully.');
        return redirect('dashboard');
    }
}
