<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use App\User;
use App\Member;
use App\Schedule;
use App\categoryloan;
use DB;
use Datetime;
use Session;
class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$data['list_loan'] = loan::getloan();
        return view('Loan.index', $data);
    }
    public function approved_loan()
    {
        $data['list_loan'] = loan::getloan();
        return view('Loan.approved_loan', $data);
    }
    public function start_payment()
    {
        $data['list_loan'] = loan::getloan();
        return view('Loan.start_loan_payment', $data);
    }
    public function paid_loan()
    {
        $data['list_loan'] = loan::getloan();
        return view('Loan.paid_loan', $data);
    }
    public function rejected_loan()
    {
        $data['list_loan'] = loan::getloan();
        return view('Loan.rejected_loan', $data);
    }

    public function create(Request $req, $id){
      
        $data['id'] = $id;
        $data['members'] = Member::where('id', '=', $id)->first();
        $data['categories'] = categoryloan::where('status', '=', "Enable")->get();
        if($req->all())
        {
            $count=0;
            $list_loans = DB::table('categoryloans')->where('id','=', $req->cat_id)->first();
            $loans = loan::where('member_id','=',$id)->get();
            foreach ($loans as $l) 
            {
                if($l->status !="Paid")
                {
                     $count+=1;
                }
            }
            if($count==0)
            {
                $salary = Member::find($id)->first();
                if(((($salary->salary * .10)*$req->loan_period)<=$req->amount) && ((($salary->salary * .20)*$req->loan_period) >= $req->amount))
                {
                if(($list_loans->maximum_loan >= $req->amount) && ($list_loans->minimum_loan <= $req->amount))
                {
                    $loan = new loan();
                    $loan->loan_amount= $req->amount;
                    $loan->date= date('Y-m-d H:i:s');
                    $loan->loan_period= $req->loan_period;
                    $loan->status = "Pending";
                    $loan->member_id= $id;
                    $loan->category_id= $req->cat_id;
                    if($req->interest!=null)
                    {
                         $loan->interest= $req->interest;
                    }
                    else
                    {
                        $loan->interest= $list_loans->interest;
                    }
                    $loan->save();
                    return redirect('/Loan');
                }
                else
                {
                    return redirect('/Loan/Create/'.$id)
                    ->with('errors', 'The Loan range for '. $list_loans->loantype .': min = ₱ ' .number_format($list_loans->minimum_loan,2).' to max = ₱ '. number_format($list_loans->maximum_loan,2));
                }
                }
                else
                {
                     return redirect('/Loan/Create/'.$id)
                    ->with('errors', 'The Range Loan for this member : Minimum = ₱ '.number_format((($salary->salary * .10)*$req->loan_period),2).' to Maximum = ₱ '. number_format((($salary->salary * .20)*$req->loan_period),2).' within '.$req->loan_period. ' month');
                }
            }
            else
            {
                 return redirect('/Loan/Create/'.$id)
                    ->with('errors', 'We have Existing Loan');
            }
        } 
        else 
        {
            return view('/Loan.create', $data);
        }
    }

    public function edit(Request $req, $id)
    {
        $loan = loan::find($id);
        $data['id'] = $id;
        $data['member'] = Member::where('id', '=', $loan->member_id)->first();
        $data['categories'] = categoryloan::where('status', '=', "Enable")->get();
        $data['loan'] = loan::where('id', '=', $id)->first();
       
        if($req->all())
        {
            $list_loans = DB::table('categoryloans')->where('id','=', $req->cat_id)->first();
            $loans = loan::where('member_id', '=', $req->$id)->get();
            $count=0;
            foreach ($loans as $l) 
            {
                if($l->status!="Paid")
                {
                    $count++;
                }
            }
            if($count==0)
            {
                $salary = Member::find($req->member_id)->first();
                if(((($salary->salary * .10)*$req->loan_period)<=$req->amount) && ((($salary->salary * .20)*$req->loan_period) >= $req->amount))
                {
                if(($list_loans->maximum_loan >= $req->amount) && ($list_loans->minimum_loan <= $req->amount))
                {
                    $loan = loan::find($id);
                    $loan->loan_amount= $req->amount;
                    $loan->date= date('Y-m-d H:i:s');
                    $loan->loan_period= $req->loan_period;
                    $loan->status = "Pending";
                    $loan->member_id= $req->member_id;
                    $loan->category_id= $req->cat_id;
                    if($req->interest!=null)
                    {
                         $loan->interest= $req->interest;
                    }
                    else
                    {
                        $loan->interest= $list_loans->interest;
                    }
                    $loan->update();
                    return redirect('/Loan');
                }
                else
                {
                    return redirect('/Loan/Edit/'.$id)
                    ->with('errors', 'The Loan range : min = '.number_format($list_loans->minimum_loan,2).' to max = '. number_format($list_loans->maximum_loan,2));
                }
                }
                else
                {
                     return redirect('/Loan/Edit/'.$id)
                    ->with('errors', 'The Range Loan per Member : Minimum = '.number_format((($salary->salary * .10)*$req->loan_period),2).' to Maximum = '. number_format((($salary->salary * .20)*$req->loan_period),2).' within '.$req->loan_period. ' month');
                }
            }
            else
            {
                 return redirect('/Loan/Edit/'.$id)
                    ->with('errors', 'We have Existing Loan');
            }
        } 
        else 
        {
            return view('/Loan.edit', $data);
        }
    }

    public function approved($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Approved";
         $loan->save();
        return redirect('/Loan/Approved');
    }
    public function start($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Started";
         $loan->save();
        return redirect('/Loan/Start');
    }
    public function rejected($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Rejected";
         $loan->save();
        return redirect('/Loan/Rejected');
    }
    public function cancelled($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         if($loan->status=="Approved")
         {
            $loan->status = "CancelApproved";
            $loan->save();
            return redirect('/Loan/Approved');
         }
         else
         {
            $loan->status = "Cancelled";
            $loan->save();
            return redirect('/Loan');
         }
         
    }
    public function uncancelled($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         if($loan->status=="CancelApproved")
         {
            $loan->status = "Approved";
            $loan->save();
            return redirect('/Loan/Approved');
         }
         else
         {
            $loan->status = "Pending";
            $loan->save();
            return redirect('/Loan');
         }
    }
    public function amortization($id)
    {
        $data['amortization'] = Schedule::getloan($id);
        $data['payment'] = Schedule::where('loan_id', '=', $id)->get();
        return view('Loan.amortization', $data);
    }
    public function loanmember($id)
    {
        $data['member'] = member::find($id)->first();
        $data['loans'] = loan::get_loan_permember($id);
        return view('Loan.loanmember', $data);
    }
}
