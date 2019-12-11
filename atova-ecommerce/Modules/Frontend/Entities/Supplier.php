<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps      = false;
    protected $primaryKey   = "users_id";
    protected $table        = 'hr__suppliers';

    protected $fillable     = ['title', 'description', 'image', 'country'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Modules\Frontend\Entities\User', 'users_id', 'id');
    }


    public static function supplierList()
    {
        $suppliers = Supplier::all();
        $list = array();
        foreach ($suppliers as $supplier) {
            $list[$supplier->users_id] = $supplier->user->first_name . ' ' . $supplier->user->last_name;
        }
        return $list;
    }
}
