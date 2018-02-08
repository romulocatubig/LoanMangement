<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$data = [];
        $data['list_member'] =  Member::All();
        return view('Member.index', $data);
    }
    public function create()
    {
        return view('Member.create');
    }
    public function creates(Request $req)
    {
        $user = new Member();
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->salary= $req->salary;
        $user->status= "Active";
        $user->contact= $req->contact;
        $user->save();
        return redirect('/Member');
    }
    public function edit($id)
    {
    	$data = [];
        $data['list_member']= DB::table('members')->where('id', $id)->get();
        return view('Member.edit', $data);
    }
    public function edits(Request $req)
    {
        $id = $req->id;
        $user = Member::Find($id);
        $user->firstname= $req->firstname;
        $user->lastname= $req->lastname;
        $user->middlename= $req->middlename;
        $user->address= $req->address;
        $user->salary= $req->salary;
        $user->contact= $req->contact;
        $user->update();
         return redirect('/Member');
    }
    public function update(Request $req)
    {
        $id = $req->id;
        $user = Member::Find($id);
        if($user->status!="Active")
        {
        	$user->status= "Active";
    	}
    	else
    	{
    		$user->status= "Inactive";
    	}
        $user->update();
        return redirect('/Member');
    }
    public function delete($id)
    {
        $list_user = DB::table('users')->where('id', $id)->get();
        return view('Member.delete')->with(['list_user' => $list_user]);
    }
     public function deletes(Request $req)
    {
        $id = $req->id;
        $user = User::Find($id);
        $user->delete();
         return redirect('/Member');
    }
}
