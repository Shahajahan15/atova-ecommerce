<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'users_id';

    public $timestamps = false;

    protected $table    = 'hr__employees';
    protected $fillable = [
        'users_id', 'religion', 'dob', 'present_address', 'permanent_address', 'post_code', 'city', 'country', 'state',
        'nid', 'employee_id', 'designation_id', 'qualification', 'hire_date', 'salary', 'tier_types_id'
    ];


    public function user()
    {
        return $this->belongsTo('Modules\Hr\Entities\User', 'users_id', 'id');
    }



    public function designation()
    {
        return $this->belongsTo('Modules\Hr\Entities\Designation', 'designation_id', 'id');
    }


    public function tierType()
    {
        return $this->belongsTo('Modules\Hr\Entities\TierType', 'tier_types_id', 'id');
    }


}
