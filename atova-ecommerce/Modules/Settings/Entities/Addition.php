<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    public $timestamps      = false;

    protected $table        = "settings__additions";

    protected $fillable     = ['behavior', 'coupon_number', 'title', 'description', 'type', 'value', 'start_date', 'end_date', 'status'];
}
