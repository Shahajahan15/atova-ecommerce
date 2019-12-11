<?php

namespace Modules\Hr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class HrController extends CoreAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Human Resource';
        $this->data['info']->menu       = 'Human Resource';
        $this->data['info']->subMenu    = '';
    }

}
