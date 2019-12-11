<?php

namespace Modules\Invest\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__payment_methods";

    protected $fillable = ['title', 'note'];


    public static function arrList()
    {
        $methods = PaymentMethod::all();
        $arr = array();
        foreach ($methods as $method) {
            $arr[$method->id] = $method->title;
        }
        return $arr;
    }



}
