<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class BankWithdraw extends Model
{
    public $timestamps = false;

    protected $table    = 'bank__withdraw';

    protected $fillable = ['account_id', 'employees_id', 'amount', 'note', 'transaction_reason_id', 'date'];

}
