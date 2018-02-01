<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\loan;
use DB;
use Session;

class ScheduleController extends Controller
{
    public function index($id)
    {
        $list_sched = Schedule::getsched($id);
        $list_loans = Schedule::getloan($id);
        return view('Schedule.index', compact('list_sched'), compact('list_loans'));
    }
    public function create($id)
    {
    	$list_loans = Schedule::getloan($id);
        return view('Schedule.create', compact('list_loans'));
    }
    public function creates(Request $req)
    {
        $payment=0;
        $validate=0;
        $count=0;
    	// $loan = Schedule::where('id', '=', $req->loan_id)->get();
    	$loans = Schedule::getsched($req->loan_id);
        $loan = Schedule::getloan($req->loan_id);
        foreach ($loans as $l) {
            $payment += $l->principle;
            $validate = $l->balance;
            $count++;
        }
        if($count==0)
        {
            $validate = $loan[0]->loan_amount;
        }
        if($validate >= ($req['payment'] - ($req['payment'] * ($loan[0]->interest / 100))))
        {
    	$principle = ($req['payment'] - ($req['payment'] * ($loan[0]->interest / 100 )));
    	$balance = (($loan[0]->loan_amount-$payment) - ($req['payment'] - ($req['payment'] * ($loan[0]->interest  / 100))));
    	$sched = new Schedule();
    	$sched->payment= $req->payment;
    	$sched->payment_date = date('Y-m-d H:i:s');
    	$sched->principle= $principle;
    	$sched->balance= $balance;
    	$sched->loan_id= $req->loan_id;
    	$sched->save();
        return redirect('/Loan');
        }
        else
        {
            Session::flash('message', 'Your Current Balance is : P');
            Session::flash('alert', $validate);
            $list_loans = Schedule::getloan($req->loan_id);
            return view('Schedule.create', compact('list_loans'));
        }
    }
}
