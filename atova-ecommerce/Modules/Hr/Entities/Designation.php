<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public $timestamps = false;

    protected $table     = 'hr__designations';

    protected $fillable  = [
        'title'
    ];


    /**
     * List of Designation
     * @return array
     */
    public static function designationArray() {
        $designations       = Designation::all();
        $designationArray   = array();

        foreach ($designations as $designation) {
            $designationArray[$designation->id] = $designation->title;
        }
        return $designationArray;
    }


    public function employees()
    {
        return $this->hasMany('Modules\Hr\Entities\Employee', 'designation_id', 'id');
    }

}
