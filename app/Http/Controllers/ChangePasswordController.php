<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.auth.change-password');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        // Invalid current password
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not match with the old password.");
        }

        // New and current password cannot be same
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        //Change Password
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
