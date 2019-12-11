<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\CoreAdminController;

class BankAdminController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
    }
}
