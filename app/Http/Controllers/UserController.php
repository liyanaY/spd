<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // model User
use Auth;

class UserController extends Controller
{
    // create function index
    /*public function index() 
    {
    	return view('frontend.index');
    }*/

    public function dashboard()
    {
        return view('backend.index');
    }

    public function login() 
    {
    	return view('frontend.login');
    }

    public function register() 
    {
        return view('frontend.register');
    }

    public function logout() 
    {
        Auth::logout(); // to logout current user
        return redirect()->route('index')->withSuccess('Logout Success');
    }

    // Untuk register
    public function registerPost(Request $request)  // Request =  class name
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'ic' => 'required|unique:users',
            'password' => 'required'
        ], [
            'name.required' => 'Sila masukkan nama',
            'email.email' => 'Email tidak sah',
            'email.unique' => 'Email telah wujud'
        ]);

        // Untuk masukkan data ke dalam db
        $user = new User(); // create new class named User (drp model User)
        $user->name = $request->name; // asign variable
        $user->email = $request->email;
        $user->ic = $request->ic;
        $user->password = bcrypt($request->password); // utk encrypt password using bcrypt function
        $user->save(); // save ke db

        return back()->with('success', 'Successfully register'); // with(<session>, <msg dia>)
        
    }

    // Untuk Login
    public function loginPost(Request $request)  // Request =  class name
    {
    	$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Sila masukkan nama',
            'email.email' => 'Email tidak sah',
            'password.required' => 'Masukkan password',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('user.dashboard');
        }
        else
        {
            return redirect()->back()->withError('Login Failed');
        }
    }
}
