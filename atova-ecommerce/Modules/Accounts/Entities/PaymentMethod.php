<?php

namespace Modules\Accounts\Entities;

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


    /**
     * For payments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('Modules\Accounts\Entities\Payment', 'payment_categories_id', 'id');
    }


    /**
     * For Receipts information
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('Modules\Accounts\Entities\Receipt', 'payment_categories_id', 'id');
    }


}
