<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ApiController extends Controller
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
    
    public function checkToken($token)
    {
        $tokens = DB::table('api_tokens')->get();
        foreach ($tokens as $key)
        {
            if($key->token == $token && $key->ip == $_SERVER['REMOTE_ADDR'])
            {
                return true;
            }
        }
        return false;
    }
    
    public function members($token)
    {
        if($this->checkToken($token))
        {
            $users = User::get(['student_id', 'fname', 'lname', 'role', 'avatar', 'biography']);
            if($users != null)
            {
                return $users;
            } else {
                die('null');
            }
        }
        
        die('Invalid API Key. Access Denied.');
    }

    public function member($token, $sid)
    {
        if($this->checkToken($token))
        {
            $user = User::where('student_id', $sid)->first(['student_id', 'fname', 'lname', 'role', 'avatar', 'biography']);
            if($user != null)
            {
                return $user;
            } else {
                die('null');
            }
        }

        die('Invalid API Key. Access Denied.');
    }
}
