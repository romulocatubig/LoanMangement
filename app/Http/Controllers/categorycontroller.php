<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categorycontroller extends Controller
{
    public function index()
    {
    	return view();
    }
    public function create(Request $req)
    {
    	$cat = new Category();
    	$cat->loantype= $req->type;
    	$cat->interest= $req->interest;
    	$cat->minimum= $req->min;
    	$cat->maximum= $req->max;
    	$cat->save();
    	return view('Category.index');
    }
}
