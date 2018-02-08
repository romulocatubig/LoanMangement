<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Member;
use App\loan;
use App\Schedule;
use App\categoryloan;
use Charts;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function charts()
    {
    	// $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    	// 			->get();
    	$list_cat = categoryloan::All();
        $list_loan = loan::All();
        // $chart = Charts::database($users, 'bar', 'highcharts')
			     //  ->title("Monthly new Register Users")
			     //  ->elementLabel("Total Users")
			     //  ->dimensions(1000, 500)
			     //  ->responsive(false)
			     //  ->groupByMonth(date('Y'), true);
        return view('Charts.chart',compact('list_cat'),compact('list_loan'));
    }
     public function payments()
    {
        $list_cat = categoryloan::All();
        $list_loan = loan::All();
        $list_sched = Schedule::All();
        return view('Charts.paymentchart',compact('list_cat'),compact('list_loan'),compact('list_sched'));
    }
    public function users()
    {
        $list_user = Member::All();
        $list_loan = loan::All();
        return view('Charts.UserChart',compact('list_user'),compact('list_loan'));
    }
}
