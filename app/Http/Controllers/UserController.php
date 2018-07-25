<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // model User

class UserController extends Controller
{
    // create function index
    /*public function index() 
    {
    	return view('frontend.index');
    }*/

    public function login() 
    {
    	return view('frontend.login');
    }

    public function register() 
    {
        return view('frontend.register');
    }

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

    /*public function home() 
    {
    	return view('frontend.index');
    }*/
}
