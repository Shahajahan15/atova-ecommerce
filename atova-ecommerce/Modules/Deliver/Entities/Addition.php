<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    public $timestamps      = false;
    protected $table        = "deliver__addition";

    protected $fillable     = ['title', 'type', 'amount', 'nate', 'deliver__invoice_id'];
}
