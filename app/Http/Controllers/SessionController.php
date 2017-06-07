<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SessionController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest',['except' => ['index','destroy']]);
    }

    public function index()
    {
    	if(Auth::check())
    	{
    		return redirect('/dashboard');
    	}
    	else
    	{
    		return view('auth.login');
    	}
    }

    public function login()
    {
    	if(! auth()->attempt(request(['email','password'])))
    	{
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'

    			]);
    	}

    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/')->with('message','Successfully logged you out.');
    }
}
