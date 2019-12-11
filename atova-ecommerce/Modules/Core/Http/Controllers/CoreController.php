<?php

namespace Modules\Core\Http\Controllers;

use Nwidart\Modules\Routing\Controller;

class CoreController extends CoreAdminController
{


    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		return view('core::site', $this->data);
	}

}
