<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class create_usercontroller extends Controller
{
    public function index()
    {
    	return view();
    }
    public function create(Request $req)
    {
    	$user = new User();
    	$user->firstname= $req->firstname;
    	$user->lastname= $req->lastname;
    	$user->middlename= $req->middlename;
    	$user->address= $req->address;
    	$user->save();
    	return view('User.index');
    }
}
