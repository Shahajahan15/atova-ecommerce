<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public $timestamps      = false;
    protected $table        = "invest__withdraw";

    protected $fillable     = ['investors_id', 'employee_id', 'payment_methods_id', 'transaction_number', 'amount', 'note', 'date'];


}
