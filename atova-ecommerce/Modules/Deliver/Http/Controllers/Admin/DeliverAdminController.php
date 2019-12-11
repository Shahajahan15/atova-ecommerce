<?php

namespace Modules\Deliver\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\CoreAdminController;

class DeliverAdminController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Deliver';
        $this->data['info']->menu       = 'Deliver';
        $this->data['info']->subMenu    = '';
    }
}
