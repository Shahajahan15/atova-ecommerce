<?php

namespace Modules\Settings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class SettingsAdminController extends CoreAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Settings';
        $this->data['info']->menu       = 'Settings';
        $this->data['info']->subMenu    = '';
    }

}
