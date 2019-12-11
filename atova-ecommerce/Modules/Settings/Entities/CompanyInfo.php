<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    public $timestamps      = false;

    protected $table        = "settings__company";

    protected $fillable     = ['title', 'email', 'mobile', 'fax', 'address', 'Logo', 'post_code', 'city', 'state', 'country', 'currency'];
}
