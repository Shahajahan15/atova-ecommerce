<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Nwidart\Modules\Routing\Controller;

class CoreAdminController extends Controller
{
    public  $data = array();

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->data['user']             = Auth::user();
            return $next($request);
        });

        $this->data['info']             = new \stdClass();
        $this->data['info']->title      = 'E-commerce Admin';
        $this->data['info']->menu       = '';
        $this->data['info']->subMenu    = '';
        $this->data['info']->thirdMenu    = '';
    }

}
