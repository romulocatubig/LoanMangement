<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\loan;
use App\User;
use App\categoryloan;
use DB;
use Session;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $balance=0;
        $temp_balance=0;
    	// $loan = Schedule::where('id', '=', $req->loan_id)->get();
    	$loans = Schedule::getsched($req->loan_id);
        $loan = Schedule::getloan($req->loan_id);
        foreach ($loans as $l) {
            $payment += $l->principle;
            $validate += $l->payment;
            $count++;
            $temp_balance=$l->balance;
        }
        $total_amount = $loan[0]->loan_amount+($loan[0]->loan_amount * ($loan[0]->interest / 100));
        
        if($count==0)
        {
            $temp_balance = $total_amount-$req['payment'];
        }
        else
        {
            $temp_balance-=$req['payment'];
        }
        if(($total_amount - $validate) >= $req['payment'])
        {
    	$interest = (($req['payment'] - ($req['payment'] * ($loan[0]->interest / 100 ))));
        $principle = ($req['payment'] - ($interest * ($loan[0]->interest / 100 )));
    	$balance =  $temp_balance;
    	$sched = new Schedule();
    	$sched->payment= $req->payment;
    	$sched->payment_date = date('Y-m-d H:i:s');
    	$sched->principle= $principle;
    	$sched->balance= $balance;
    	$sched->loan_id= $req->loan_id;
    	$sched->save();
        $validate += $req->payment;
        if(($total_amount - $validate)==0)
        {
            $loan = loan::find($req->loan_id);
            $loan->status= "Paid";
            $loan->update();
            return redirect('/Loan/Paid');
        }
        return redirect('/Schedule/'.$req->loan_id);
        }
        else
        {
            Session::flash('message', 'Your Current Balance is : P');
            Session::flash('alert', $validate);
            $data['list_loans'] = Schedule::getloan($req->loan_id);
            return view('Schedule.index', $data);
        }
    }
    public function scheme(Request $req)
    {
        if($req->all())
        {
            $data['list_users'] = User::All();
            $data['list_payment'] = Schedule::schemes($req->year);
            $data['loans'] = loan::search_loan($req->year);
            $data['category'] = categoryloan::All();
            return view('Schedule.monthlyscheme', $data);
        }
        else
        {
            $data['list_users'] = User::All();
            $data['list_payment'] = Schedule::scheme();
            $data['loans'] = loan::All();
            $data['category'] = categoryloan::All();
            return view('Schedule.monthlyscheme', $data);
        }
       
    }
}
