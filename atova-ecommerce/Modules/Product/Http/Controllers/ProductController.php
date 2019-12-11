<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class ProductController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
    }
}
