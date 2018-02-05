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
    public function index()
    {
    	$list_loan = loan::getloan();
        return view('Loan.index', compact('list_loan'));
    }
    public function approved_loan()
    {
        $list_loan = loan::getloan();
        return view('Loan.approved_loan', compact('list_loan'));
    }
    public function paid_loan()
    {
        $list_loan = loan::getloan();
        return view('Loan.paid_loan', compact('list_loan'));
    }
    public function rejected_loan()
    {
        $list_loan = loan::getloan();
        return view('Loan.rejected_loan', compact('list_loan'));
    }

    public function create(Request $req, $id){
      
        $data['id'] = $id;
        $data['members'] = Member::where('id', '=', $id)->first();
        $data['categories'] = categoryloan::where('status', '=', "Enable")->get();
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
                    ->with('errors', 'The Loan range : min = '.number_format($list_loans->minimum_loan,2).' to max = '. number_format($list_loans->maximum_loan,2));
                }
                }
                else
                {
                     return redirect('/Loan/Create/'.$id)
                    ->with('errors', 'The Range Loan per Member : Minimum = '.number_format((($salary->salary * .10)*$req->loan_period),2).' to Maximum = '. number_format((($salary->salary * .20)*$req->loan_period),2).' within '.$req->loan_period. ' month');
                }
            }
            else
            {
                 // $data['error'] = [];
                 // $data['error']['message'] = 'We have Existing Loan';
                 // return view('/Loan.create', $data);
                 return redirect('/Loan/Create/'.$id)
                    ->with('errors', 'We have Existing Loan');
            }
        } 
        else 
        {
            return view('/Loan.create', $data);
        }
    }



    public function approved($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Approved";
         $loan->save();
        return redirect('/Loan');
    }
    public function rejected($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Rejected";
         $loan->save();
        return redirect('/Loan');
    }
    public function cancelled($id)
    {
         $loan = loan::Find($id);
         $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Cancelled";
         $loan->save();
        return redirect('/Loan');
    }
    public function uncancelled($id)
    {
         $loan = loan::Find($id);
          $loan->date= date('Y-m-d H:i:s');
         $loan->status = "Pending";
         $loan->save();
        return redirect('/Loan');
    }
    public function amortization($id)
    {
        $data['amortization'] = Schedule::getloan($id);
        return view('Loan.amortization', $data);
    }
}
