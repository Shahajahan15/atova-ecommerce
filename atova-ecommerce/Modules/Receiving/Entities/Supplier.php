<?php

namespace Modules\Receiving\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps      = false;
    protected $primaryKey   = "users_id";
    protected $table        = 'hr__suppliers';

    protected $fillable     = [
        'users_id', 'present_address', 'permanent_address', 'post_code', 'city', 'country', 'state',
        'company_name', 'company_phone', 'company_mobile', 'company_fax', 'company_address', 'tier_types_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Modules\Receiving\Entities\User', 'users_id', 'id');
    }


    public static function listArray()
    {
        $all = Supplier::all();
        $arr = array();

        foreach ($all as $item) {
            $arr[$item->users_id] = $item->user->first_name . ' ' . $item->user->last_name;
        }

        return $arr;
    }
}
