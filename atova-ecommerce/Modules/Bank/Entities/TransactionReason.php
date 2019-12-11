<?php

namespace Modules\Bank\Entities;

use Illuminate\Database\Eloquent\Model;

class TransactionReason extends Model
{
    public $timestamps = false;

    protected $table    = 'bank__transaction_reason';

    protected $fillable = ['title', 'note'];

    public static function listArray()
    {
        $all = TransactionReason::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] = $item->title;
        }
        return $arr;
    }
}
