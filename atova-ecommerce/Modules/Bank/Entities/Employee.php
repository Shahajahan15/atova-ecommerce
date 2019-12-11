<?php

namespace Modules\Bank\Entities;

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
        return $this->belongsTo('Modules\Bank\Entities\User', 'users_id', 'id');
    }



    public static function listArray()
    {
        $all = Employee::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->users_id] = $item->user->first_name . ' ' . $item->user->last_name;
        }
        return $arr;
    }

}
