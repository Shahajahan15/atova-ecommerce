<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class AccountsAdminController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Accounts';
        $this->data['info']->menu       = 'Accounts';
        $this->data['info']->subMenu    = '';
    }
}
