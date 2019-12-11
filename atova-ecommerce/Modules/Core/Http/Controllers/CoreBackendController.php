<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Nwidart\Modules\Routing\Controller;

class CoreBackendController extends Controller
{

    public  $data = array();

    public function __construct()
    {
        $this->data['info']         = new \stdClass();
        $this->data['user']         = Auth::user();
        $this->data['info']->title  = 'Art Of CSE';
        $this->data['info']->menu   = '';
    }

}
