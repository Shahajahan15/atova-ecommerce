<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey   = "users_id";
    public $timestamps      = false;

    protected $table        = 'hr__customers';

    protected $fillable     = [
        'users_id', 'present_address', 'permanent_address', 'post_code', 'city', 'country', 'state',
        'company_name', 'company_phone', 'company_mobile', 'company_fax', 'company_address', 'tier_types_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Modules\Deliver\Entities\User', 'users_id', 'id');
    }


    public static function listArray()
    {
        $all = Customer::all();
        $arr = array();

        foreach ($all as $item) {
            $arr[$item->users_id] = $item->user->first_name . ' ' . $item->user->last_name;
        }

        return $arr;
    }
}
