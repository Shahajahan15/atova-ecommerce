<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;

class TierType extends Model
{
    public $timestamps      = false;
    protected $table        = 'hr__tier_types';
    protected $fillable     = [
        'title'
    ];


    public static function tierTypeArray() {
        $tierTypes       = TierType::all();
        $tierTypeArray   = array();

        foreach ($tierTypes as $tierType) {
            $tierTypeArray[$tierType->id] = $tierType->title;
        }
        return $tierTypeArray;
    }


    /**
     * Employee of a tier type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('Modules\Hr\Entities\Employee', 'tier_types_id', 'id');
    }


    /**
     * Customers of a tier type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('Modules\Hr\Entities\Customer', 'tier_types_id', 'id');
    }


    /**
     * Suppliers of a tier type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suppliers()
    {
        return $this->hasMany('Modules\Hr\Entities\Supplier', 'tier_types_id', 'id');
    }


}
