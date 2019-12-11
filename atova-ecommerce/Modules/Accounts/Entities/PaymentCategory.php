<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentCategory extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__payment_categories";

    protected $fillable = ['title', 'note'];

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


    public static function listArray()
    {
        $all = PaymentCategory::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] = $item->title;
        }
        return $arr;
    }


}
