<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('user.user_edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'old_password' => ['required'],
            'password' => ['confirmed']
        ]);
        $hashedPassword = Auth::user()->password;
        if (request('password')) {
            $hashedPassword = Hash::make($request->password);
        }

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        } else
            $user->update([
                'email' => $request->email,
                'password' => $hashedPassword
            ]);
        return redirect(route('admin.home'))->with('success', 'User has been Updated successfully');
    }
}
