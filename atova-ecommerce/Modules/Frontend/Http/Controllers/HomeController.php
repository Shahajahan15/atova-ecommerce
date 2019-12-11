<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Frontend\Entities\Product;

class HomeController extends CoreFrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['products'] = Product::orderBy('id', 'desc')->take(12)->get();

        return $this->loadView('home.index');
    }


}
