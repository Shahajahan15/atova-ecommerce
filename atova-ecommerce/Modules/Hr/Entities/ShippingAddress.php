<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $primaryKey   = "users_id";
    public $timestamps      = false;

    protected $table        = 'hr__shipping_address';

    protected $fillable     = [
        'users_id', 'sa_first_name', 'sa_last_name', 'sa_mobile', 'sa_present_address', 'sa_permanent_address',
        'sa_post_code', 'sa_city', 'sa_country', 'sa_state'
    ];


    public function user()
    {
        return $this->belongsTo('Modules\Hr\Entities\User', 'users_id', 'id');
    }
}
