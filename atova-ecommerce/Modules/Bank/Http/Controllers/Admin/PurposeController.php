<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;
use Modules\Bank\Entities\TransactionReason;
use Modules\Bank\Http\Requests\ReasonRequest;

class PurposeController extends BankAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Bank';
        $this->data['info']->subMenu    = 'Purpose';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Accounts';
        $this->data['purposes']         = TransactionReason::orderBy('id', 'desc')->paginate(20);
        return view('bank::admin.purpose.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode']             = 'create';
        return view('bank::admin.purpose.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ReasonRequest $request)
    {
        TransactionReason::create($request->all());
        Flash::success('Created successfully');
        return redirect('bank/admin/purposes');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode']     = 'edit';
        $this->data['purpose']  = TransactionReason::find($id);
        return view('bank::admin.purpose.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ReasonRequest $request, $id)
    {
        $data                   = $request->all();
        $purpose                = TransactionReason::find($id);
        $purpose->title         = $data['title'];
        $purpose->note          = $data['note'];
        $purpose->save();
        Flash::success('Updated successfully');
        return redirect('bank/admin/purposes');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Bankpurpose::find($id)->delete();
        return redirect('bank/admin/purposes');
    }
}
