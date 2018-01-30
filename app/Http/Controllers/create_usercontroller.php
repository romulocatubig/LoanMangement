<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class create_usercontroller extends Controller
{
    public function index()
    {
    	$list_user = User::All();
        return view('User.index')->with(['list_user' => $list_user]);
    }
    public function create()
    {
        return view('User.create');
    }
    public function creates(Request $req)
    {
        $user = new User();
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->save();
        $list_user = User::All();
        return view('User.index')->with(['list_user' => $list_user]);
    }
    public function edit(Request $req)
    {
        $id = $req->id;
        $user = User::Find($id);
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->update();
        $list_user = User::All();
        return view('User.index')->with(['list_user' => $list_user]);
    }
     public function delete(Request $req)
    {
        $id = $req->id;
        $user = User::Find($id);
        $user->delete();
        $list_user = User::All();
        return view('User.index')->with(['list_user' => $list_user]);
    }
}
