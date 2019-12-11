<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    public $timestamps      = false;
    protected $table        = "deliver__reduction";

    protected $fillable     = ['title', 'type', 'amount', 'note', 'deliver__invoice_id'];
}
