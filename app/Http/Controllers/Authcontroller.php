<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/ |',
            'min:4',
        ]);

        $request['password'] = Hash::make($request['password']);
        User::create($request->all());
        Session::flash('success', 'Registered successfully');

        return redirect()->route('courses');    }

    public function login(Request $request)
    {
        $validData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');
        if (Auth::attempt($validData, $remember)) {
           $request->session()->regenerate();
           $userId = Auth::user()->id;

        return redirect()->route('profile', ['id' => $userId]);
        } 
        else {
            return back()->withInput($validData)->with('error' ,'invalid email or password');
        }
    }
}
