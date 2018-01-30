<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use App\User;
use App\categoryloan;
use DB;
use Datetime;

class LoanController extends Controller
{
    public function index()
    {
    	$list_loan = loan::getloan();
    	// $list_loan = loan::All();
    	// die(var_dump($list_loan));
        return view('Loan.index', compact('list_loan'));
    }
    public function create()
    {
    	$users = User::All(['id', 'firstname']);
    	$categories = categoryloan::All(['id', 'loantype']);
        return view('Loan.create', compact('users', 'users'), compact('categories', 'categories'));
    }
    public function creates(Request $req)
    {
    	$loan = new loan();
    	$loan->loan_amount= $req->amount;
    	$loan->date= date('Y-m-d H:i:s');
    	$loan->user_id= $req->user_id;
    	$loan->category_id= $req->cat_id;
    	$loan->save();
    	$list_loan = loan::All();
        return view('Loan.index')->with(['list_loan' => $list_loan]);
    }
}
