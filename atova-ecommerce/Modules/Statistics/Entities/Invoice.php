<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps      = false;
    protected $table        = "deliver__invoice";

    protected $fillable     = ['type', 'date', 'challan_no', 'note', 'employees_id', 'users_id', 'status', 'deliver__status_id'];


}
