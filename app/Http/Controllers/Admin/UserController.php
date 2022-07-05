<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return 'works';
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if ($user) 
        {
            $user->role_as = $request->role_as;

            $user->update();
            return redirect('admin/user')->with('message', 'User updated successfully!');
        }

        return redirect('admin/user')->with('message_delete', 'No user found');
    }
}
