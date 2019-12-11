<?php

namespace Modules\Expenditure\Entities;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    public $timestamps = false;

    protected $table    = 'expense__category';

    protected $fillable = ['title', 'note'];

    public static function listArray()
    {
        $all = ExpenseCategory::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] =  $item->title;
        }
        return $arr;
    }
}
