<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
        $account = User::All();
        foreach ($account as $a) {
            if($a->username == $req->username && $a->password == $req->password)
            {
                if($a->username == $req->username && $a->password == $req->password && $a->status == "Active")
                {
                    return redirect('/User');    
                }
                else
                {
                     return redirect(route('login'))->with('errors_msg', 'Deactivated Account');
                }
            }
            else
            {
                return redirect(route('login'))->with('errors_msg', 'Invalid User or password');
            }
        }

        // if(Auth::User(['username' => $req->username, 'password' => $req->password]))
        // {
        //     return redirect('/User');    
        // }
        // else
        // {
        //     return redirect(route('login'))->with('errors_msg', 'Invalid User or password');
        // }
        
    }
}
