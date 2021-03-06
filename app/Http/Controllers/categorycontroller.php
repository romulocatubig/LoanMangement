<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryloan;
use DB;

class categorycontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$list_category = categoryloan::All();
        return view('Category.index')->with(['list_category' => $list_category]);
    }
    public function create()
    {
        return view('Category.create');
    }
    public function creates(Request $req)
    {
    	$cat = new categoryloan();
    	$cat->loantype= $req->loantype;
    	$cat->interest= $req->interest;
    	$cat->minimum_loan= $req->min;
    	$cat->maximum_loan= $req->max;
        $cat->status="Enable";
    	$cat->save();
        return redirect('/Category');
        // return view('Category.index')->with(['list_category' => $list_category]);
    }
    public function edit($id)
    {
        $list_category = categoryloan::where('id', $id)->get();
        return view('Category.edit')->with(['list_category' => $list_category]);
    }
    public function edits(Request $req)
    {
        $cat = categoryloan::Find($req->id);
        $cat->loantype= $req->loantype;
        $cat->interest= $req->interest;
        $cat->minimum_loan= $req->min;
        $cat->maximum_loan= $req->max;
        $cat->update();
        return redirect('/Category');
    }
    public function update(Request $req)
    {
        $cat = categoryloan::Find($req->id);
        if($cat->status!="Enable")
        {
            $cat->status= "Enable";
        }
        else
        {
            $cat->status= "Disable";
        }
        $cat->update();
        return redirect('/Category');
    }
}
