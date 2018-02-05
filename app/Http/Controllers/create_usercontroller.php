<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class create_usercontroller extends Controller
{
    public function index()
    {
    	$data['list_user'] = User::All();
        return view('User.index', $data);
    }
    public function create(Request $req)
    {
        if($req->All())
        {
        $user = new User();
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->position= $req->position;
        $user->username= $req->username;
        $user->password= $req->password;
        $user->status= "Active";
        $user->save();
        return redirect('/User');
        }
        else
        {
            return view('User.create');
        }
    }
    public function edit($id)
    {
        $data['$list_user'] = DB::table('users')->where('id', $id)->get();
        return view('User.edit', $data);
    }
    public function edits(Request $req)
    {
        $id = $req->id;
        $user = User::Find($id);
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->salary= $req->salary;
        $user->update();
         return redirect('/User');
    }
    public function delete($id)
    {
        $list_user = DB::table('users')->where('id', $id)->get();
        return view('User.delete')->with(['list_user' => $list_user]);
    }
    public function deletes(Request $req)
    {
        $id = $req->id;
        $user = User::Find($id);
        $user->delete();
         return redirect('/User');
    }
    public function status($id)
    {
        $user = User::Find($id);
        if($user->status!="Active")
        {
            $user->status= "Active";
        }
        else
        {
            $user->status= "Deactive";
        }
        $user->update();
         return redirect('/User');
    }
}
