<?php

namespace Modules\Receiving\Entities;

use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    public $timestamps      = false;
    protected $table        = "receiving__reduction";

    protected $fillable     = ['title', 'type', 'amount', 'note', 'receiving__invoice_id'];
}
