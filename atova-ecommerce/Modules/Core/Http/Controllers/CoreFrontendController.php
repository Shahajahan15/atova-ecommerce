<?php

namespace Modules\Core\Http\Controllers;

use Nwidart\Modules\Routing\Controller;

class CoreFrontendController extends Controller
{

    public  $data = array();

    public function __construct()
    {
        $this->data['info']         = new \stdClass();
        $this->data['info']->title  = 'Art of CSE';
    }

	public function index()
	{
		return view('core::index');
	}

}
