<?php

namespace Modules\Receiving\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\CoreAdminController;

class ReceivingAdminController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Receiving';
        $this->data['info']->menu       = 'Receiving';
        $this->data['info']->subMenu    = '';
    }
}
