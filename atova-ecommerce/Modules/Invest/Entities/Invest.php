<?php

namespace Modules\Invest\Entities;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    public $timestamps      = false;
    protected $table        = "invest__invests";

    protected $fillable     = ['investors_id', 'employee_id', 'payment_methods_id', 'transaction_number', 'amount', 'nate', 'date'];


    public function employee()
    {
        return $this->belongsTo('Modules\Invest\Entities\Employee', 'employee_id', 'users_id');
    }


    public function investor()
    {
        return $this->belongsTo('Modules\Invest\Entities\Investor', 'investors_id', 'id');
    }


    public function paymentMethod()
    {
        return $this->belongsTo('Modules\Invest\Entities\PaymentMethod', 'payment_methods_id', 'id');
    }


}
