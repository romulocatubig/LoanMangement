<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;

class Schedule extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_date', 'payment', 'principal', 'balance', 'loan_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function getloan($id)
    {
        $list_loan = DB::table('loans as l')
        ->leftJoin('members as m', 'l.member_id', '=' , 'm.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->select('l.*', 'm.firstname','m.lastname','m.middlename', 'c.loantype', 'c.maximum_loan' , 'c.minimum_loan')
        ->where('l.id', '=', $id)
        ->get();
        return $list_loan;
    }
    public static function getsched($id)
    {
        $list_sched = DB::table('schedules as s')
            ->leftJoin('loans as l', 's.loan_id', '=' , 'l.id')
            ->leftJoin('members as m', 'l.member_id', '=' , 'm.id')
            ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
            ->select('s.*','l.loan_amount', 'm.firstname','m.lastname','m.middlename', 'c.loantype', 'c.interest')
            ->where('l.id', '=', $id)
            ->get();
            
        return $list_sched;
    }
    public static function scheme()
    {
            $list_sched = DB::table('schedules as s')
            ->leftJoin('loans as l', 's.loan_id', '=' , 'l.id')
            ->leftJoin('users as u', 'l.user_id', '=' , 'u.id')
            ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
            ->select('s.*','l.loan_amount', 'u.firstname','u.lastname','u.middlename', 'c.loantype', 'c.interest')
            ->get();
        return $list_sched;
    }
    public static function schemes($id, $year)
    {
           
        return $list_sched;
    }
}
 