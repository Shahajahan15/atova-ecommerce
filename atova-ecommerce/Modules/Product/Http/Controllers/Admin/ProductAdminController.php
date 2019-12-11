<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;
use Modules\Product\Http\Controllers\ProductController;

class ProductAdminController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Product';
        $this->data['info']->menu       = 'Product';
        $this->data['info']->subMenu    = '';
    }
}
