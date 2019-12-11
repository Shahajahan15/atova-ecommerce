<?php

namespace Modules\Hr\Http\Controllers\Admin;


use Modules\Hr\Http\Controllers\HrController;


class HrAdminController extends HrController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Human Resource';
        $this->data['info']->menu       = 'Human Resource';
        $this->data['info']->subMenu    = '';
    }
}
