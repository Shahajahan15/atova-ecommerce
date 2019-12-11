<?php

namespace Modules\Statistics\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class StatisticsAdminController extends CoreAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Dashboard';
        $this->data['info']->menu       = '';
        $this->data['info']->subMenu    = '';
    }

}
