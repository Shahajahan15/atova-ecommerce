<?php

namespace Modules\Receiving\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Receiving\Entities\Addition;
use Modules\Receiving\Entities\AddRedClass;
use Modules\Receiving\Http\Requests\AdditionRequest;

class AdditionController extends Controller
{


    public function index($invoice_id)
    {
        $additions = Addition::where('receiving__invoice_id', $invoice_id)->get();
        return $additions;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(AdditionRequest $request)
    {
        $data = $request->all();
        $addRed = AddRedClass::find($data['additionId']);
        $data['type'] = $addRed->type;
        $addition = Addition::create($data);
        return $addition;
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $addition = Addition::find($id);

        if($addition->delete()) {
            return 1;
        } else {
            return 0;
        }
    }


}
