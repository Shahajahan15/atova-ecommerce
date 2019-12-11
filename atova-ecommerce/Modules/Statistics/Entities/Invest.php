<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    public $timestamps      = false;
    protected $table        = "invest__invests";

    protected $fillable     = ['investors_id', 'employee_id', 'payment_methods_id', 'transaction_number', 'amount', 'nate', 'date'];


}
