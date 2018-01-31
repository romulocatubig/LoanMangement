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
        'payment_date', 'payment', 'principal', 'balance', 'loan_id'
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
        ->select('l.*', 'u.*', 'c.*')
        ->leftJoin('users as u', 'l.user_id', '=' , 'u.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->where('l.id', '=', $id)
        ->get();
        return $list_loan;
    }
    public static function getsched($id)
    {
        $list_sched = DB::table('schedules as s')
            ->leftJoin('loans as l', 's.loan_id', '=' , 'l.id')
            ->leftJoin('users as u', 'l.user_id', '=' , 'u.id')
            ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
            ->where('l.id', '=', $id)
            ->get();
            
        return $list_sched;
    }
}
