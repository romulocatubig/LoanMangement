<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\loan;
use DB;

class ScheduleController extends Controller
{
    public function index($id)
    {
    	$list_sched = Schedule::where('loan_id','=',$id)->get();
        return view('Schedule.index', compact('list_sched'));
    }
    public function create($id)
    {
    	$list_loans = Schedule::getloan($id);
        return view('Schedule.create', compact('list_loans'));
    }
    public function creates(Request $req)
    {
    	$loan = Schedule::where('id', '=', $req->loan_id)->get();
    	$payment=0;
    	foreach ($loan as $loans) {
    		$payment += $loans->principle; 
    	}
    	$loans = Schedule::getloan($req->loan_id);
    	$principle = ($req['payment'] - ($req['payment'] * ($loans[0]->interest / 100 )));
    	$balance = (($loans[0]->loan_amount-$payment) - ($req['payment'] - ($req['payment'] * ($loans[0]->interest  / 100))));
    	$sched = new Schedule();
    	$sched->payment= $req->payment;
    	$sched->payment_date = date('Y-m-d H:i:s');
    	$sched->principle= $principle;
    	$sched->balance= $balance;
    	$sched->loan_id= $req->loan_id;
    	$sched->save();
    	$list_sched = Schedule::All();
        return view('Schedule.index', compact('list_sched'));
    }
}
