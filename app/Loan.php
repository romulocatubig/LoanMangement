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
        'loan_amount', 'date', 'user_id', 'category_id',
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
        ->select('l.*', 'u.firstname', 'c.loantype')
        ->leftJoin('users as u', 'l.user_id', '=' , 'u.id')
        ->leftJoin('categoryloans as c', 'l.category_id', '=', 'c.id')
        ->get();
        return $list_loan;
    }
}

