<?php

namespace Modules\Expenditure\Http\Controllers;

use Modules\Core\Http\Controllers\CoreAdminController;

class ExpenditureController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Expenditure';
    }
}
