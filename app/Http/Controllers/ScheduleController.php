<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\loan;
use App\User;
use DB;
use Session;

class ScheduleController extends Controller
{
    public function index($id)
    {
        $data['list_sched'] = Schedule::getsched($id);
        $data['list_loans'] = Schedule::getloan($id);
        return view('Schedule.index', $data);
    }
    public function create($id)
    {
    	$data['list_loans'] = Schedule::getloan($id);
        return view('Schedule.create', $data);
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
        return redirect('/Schedule/'.$req->loan_id);
        }
        else
        {
            Session::flash('message', 'Your Current Balance is : P');
            Session::flash('alert', $validate);
            $list_loans = Schedule::getloan($req->loan_id);
            return view('Schedule.create', compact('list_loans'));
        }
    }
    public function scheme(Request $req)
    {
        if($req->all())
        {
            $list_users = User::All();
            $list_payment = Schedule::schemes($req->user_id, $req->year);
            return view('Schedule.monthlyscheme', compact('list_payment'), compact('list_users'));
        }
        else
        {
            $list_users = User::All();
            $list_payment = Schedule::scheme();
            return view('Schedule.monthlyscheme', compact('list_payment'), compact('list_users'));
        }
       
    }
}
