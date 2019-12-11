<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Frontend\Entities\Category;

class CoreFrontendController extends Controller
{
    public $data = array();

    public function __construct()
    {
        $this->data['info'] = new \stdClass();
        $this->data['info']->title = "E-commerce Solution";
        $this->data['info']->selectedMenu = "Home";
        $this->data['info']->template = "default";

        $this->data['info']->categories = Category::where('parent_id', '=', NULL)->get();
    }

    /**
     * Load View file
     * @param $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    protected function loadView($location)
    {
        return view('frontend::' . $this->data['info']->template . '.' . $location, $this->data);
    }

}
