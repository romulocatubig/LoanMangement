<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
class loan extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'loan_amount', 'date','interest','loan_period','status', 'member_id', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function getloan()
    {
        $list_loan = DB::table('loans as l')
        ->select('l.*', 'u.firstname', 'c.loantype', 'c.maximum_loan' , 'c.minimum_loan')
        ->leftJoin('members as u', 'l.member_id', '=' , 'u.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->get();
        return $list_loan;
    }
     public static function get_loan_permember($id)
    {
        $list_loan = DB::table('loans as l')
        ->select('l.*', 'u.firstname','u.middlename', 'u.lastname','c.loantype', 'c.maximum_loan' , 'c.minimum_loan')
        ->leftJoin('members as u', 'l.member_id', '=' , 'u.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->where('l.member_id','=',$id)
        ->get();
        return $list_loan;
    }
    public static function search_loan($year)
    {
        $list_loan = DB::table('loans as l')
        ->select('l.*', 'u.firstname', 'c.loantype', 'c.maximum_loan' , 'c.minimum_loan')
        ->leftJoin('members as u', 'l.member_id', '=' , 'u.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->whereYear('l.date', '=', $year)
        ->get();
        return $list_loan;
    }
}

