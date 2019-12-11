<?php

namespace Modules\Receiving\Entities;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    public $timestamps      = false;
    protected $table        = "receiving__addition";

    protected $fillable     = ['title', 'type', 'amount', 'nate', 'receiving__invoice_id'];
}
