<?php

namespace Modules\Hr\Entities;

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


    public function user()
    {
        return $this->belongsTo('Modules\Hr\Entities\User', 'users_id', 'id');
    }


    public function shippingAddress()
    {
        return $this->hasOne('Modules\Hr\Entities\ShippingAddress', 'users_id', 'users_id');
    }

    public function tierType()
    {
        return $this->belongsTo('Modules\Hr\Entities\TierType', 'tier_types_id', 'id');
    }
}
