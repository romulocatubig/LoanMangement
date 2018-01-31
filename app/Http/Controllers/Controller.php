<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Schedule;
use Charts;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function charts()
    {
    	// $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    	// 			->get();
    	$list_sched = Schedule::All();
        // $chart = Charts::database($users, 'bar', 'highcharts')
			     //  ->title("Monthly new Register Users")
			     //  ->elementLabel("Total Users")
			     //  ->dimensions(1000, 500)
			     //  ->responsive(false)
			     //  ->groupByMonth(date('Y'), true);
        return view('Charts.chart',compact('list_sched'));
    }
}
