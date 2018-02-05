<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function login(Request $req)
    {
        die(var_dump($req->username));
        $account = User::All()->get();
        if($account->username == $req->username && $account->password == $req->paassword && $account->status == "Active")
        {
            return view('User');    
        }
        else
        {
            return view(route('login'));
        }
    }
}
