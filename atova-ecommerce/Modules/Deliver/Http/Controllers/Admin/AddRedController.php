<?php

namespace Modules\Deliver\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Deliver\Entities\AddRedClass;
use Response;
class AddRedController extends Controller
{


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function show($id)
    {
        $class = AddRedClass::find($id);

        return Response::json($class);
    }


}
