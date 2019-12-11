<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Http\Requests\PaymentMethodRequest;
use Modules\Deliver\Entities\PaymentMethod;

class PaymentMethodsController extends AccountsAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->subMenu = 'Payment Methods';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['methods'] = PaymentMethod::all();
        return view('accounts::admin.method.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('accounts::admin.method.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PaymentMethodRequest $request)
    {
        $data = $request->all();
        PaymentMethod::create($data);
        return redirect('accounts/admin/payment-methods');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode'] = 'edit';
        $this->data['method'] = PaymentMethod::find($id);
        return view('accounts::admin.method.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(PaymentMethodRequest $request, $id)
    {
        $data = $request->all();
        $category = PaymentMethod::find($id);
        $category->title = $data['title'];
        $category->note = $data['note'];
        $category->save();

        return redirect('accounts/admin/payment-methods');
    }

}
