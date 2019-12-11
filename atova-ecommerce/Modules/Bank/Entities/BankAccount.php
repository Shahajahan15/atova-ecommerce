<?php

namespace Modules\Bank\Entities;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $timestamps = false;

    protected $table    = 'bank__account';

    protected $fillable = ['bank_name', 'account_no', 'branch', 'account_type', 'description'];


    public function deposits()
    {
        return $this->hasMany('Modules\Bank\Entities\Deposit', 'account_id', 'id');
    }


    public function withdraws()
    {
        return $this->hasMany('Modules\Bank\Entities\Withdraw', 'account_id', 'id');
    }


    public static function listArray()
    {
        $all = BankAccount::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] = $item->bank_name . ' - ' . $item->account_no;
        }
        return $arr;
    }


}
