<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Employee;
use Modules\Accounts\Entities\Payment;
use Modules\Accounts\Entities\PaymentCategory;
use Modules\Accounts\Entities\PaymentMethod;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Http\Requests\PaymentRequest;

class PaymentsController extends AccountsAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->subMenu    = 'Payments';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Payments';
        $this->data['payments']         = Payment::orderBy('id', 'desc')->paginate(20);
        return view('accounts::admin.payment.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New Payment';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = PaymentCategory::listArray();

        return view('accounts::admin.payment.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PaymentRequest $request)
    {
        $data = $request->all();
        $payment = Payment::create($data);
        return redirect('accounts/admin/payments/' . $payment->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['payment']          = Payment::find($id);
        return view('accounts::admin.payment.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New Payment';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = PaymentCategory::listArray();

        $this->data['payment']          = Payment::find($id);
        return view('accounts::admin.payment.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(PaymentRequest $request, $id)
    {
        $data                           = $request->all();
        $payment                        = Payment::find($id);
        $payment->date                  = $data['date'];
        $payment->employees_id          = $data['employees_id'];
        $payment->recipient_id          = $data['recipient_id'];
        $payment->payment_categories_id = $data['payment_categories_id'];
        $payment->payment_methods_id    = $data['payment_methods_id'];
        $payment->transaction_number    = $data['transaction_number'];
        $payment->amount                = $data['amount'];
        $payment->reason                = $data['reason'];
        $payment->note                  = $data['note'];
        $payment->save();

        return redirect('accounts/admin/payments/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Payment::find($id)->delete();
        return redirect('accounts/admin/payments');
    }
}
