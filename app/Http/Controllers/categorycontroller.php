<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryloan;

class categorycontroller extends Controller
{
    public function index()
    {
    	return view();
    }
    public function create(Request $req)
    {
    	$cat = new categoryloan();
    	$cat->loantype= $req->type;
    	$cat->interest= $req->interest;
    	$cat->minimum_loan= $req->min;
    	$cat->maximum_loan= $req->max;
    	$cat->save();
    	return view('Category.index');
    }
}
