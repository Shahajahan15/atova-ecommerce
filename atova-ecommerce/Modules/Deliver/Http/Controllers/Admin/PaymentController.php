<?php

namespace Modules\Deliver\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Deliver\Entities\Invoice;
use Modules\Deliver\Entities\Payment;
use Modules\Deliver\Http\Requests\PaymentRequest;

class PaymentController extends DeliverAdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($invoice_id)
    {
        return Payment::where('deliver__invoice_id', $invoice_id)->with('paymentMethod')->get();
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PaymentRequest $request)
    {
        $data                           = $request->all();
        $data['employees_id']           = $this->data['user']->id;
        $data['payer_id']               = Invoice::find($data['deliver__invoice_id'])->users_id;
        $data['payment_categories_id']  = 1;
        $data['reason']                 = 'Sale Invoice Payment';

        $pay =  Payment::create($data);
        $payment = Payment::find($pay->id);
        $payment->paymentMethod = $payment->paymentMethod;

        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if($payment->delete()) {
            return 1;
        } else {
            return 0;
        }
    }
}
