<?php

namespace App\Http\Controllers;

use App\Department, App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
    	$departments = Department::all();

    	return view('auth.register', compact('departments'));
    }

    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'card_id' => 'required|min:2',
    		'tel_no' => 'required|numeric',
    		'department' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed|min:6'
    		]);

    	if(User::where('email', '=', request('email'))->exists())
    	{
    		return back()->withErrors([
    			'message' => 'Email already exist in database'
    			]);

    	}

    	$user = User::create([
    		'name' => request('name'),
    		'id_card' => request('card_id'),
    		'tel_no' => request('tel_no'),
    		'department' => request('department'),
    		'roles' => 'student',
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    		]);

    	auth()->login($user);

    	return redirect()->home();

    }
}
