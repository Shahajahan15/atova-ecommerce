<?php

namespace Modules\Receiving\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Receiving\Entities\AddRedClass;
use Modules\Receiving\Entities\Reduction;
use Modules\Receiving\Http\Requests\AdditionRequest;

class ReductionController extends Controller
{

    public function index($invoice_id)
    {
        $reductions = Reduction::where('receiving__invoice_id', $invoice_id)->get();
        return $reductions;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(AdditionRequest $request)
    {
        $data           = $request->all();
        $addRed         = AddRedClass::find($data['reductionId']);
        $data['type']   = $addRed->type;
        $reduction      = Reduction::create($data);
        return $reduction;
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $reduction = Reduction::find($id);

        if($reduction->delete()) {
            return 1;
        } else {
            return 0;
        }
    }

}
