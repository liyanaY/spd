<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
    }

    /*public function home() 
    {
    	return view('frontend.index');
    }*/
}
