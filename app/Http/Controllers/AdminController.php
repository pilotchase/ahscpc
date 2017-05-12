<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
