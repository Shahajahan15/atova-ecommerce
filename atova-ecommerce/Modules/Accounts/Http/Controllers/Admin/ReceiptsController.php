<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Employee;
use Modules\Accounts\Entities\PaymentCategory;
use Modules\Accounts\Entities\PaymentMethod;
use Modules\Accounts\Entities\Receipt;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Http\Requests\ReceiptRequest;

class ReceiptsController extends AccountsAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->subMenu    = 'Receipts';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Receipts';
        $this->data['receipts']         = Receipt::orderBy('id', 'desc')->paginate(20);
        return view('accounts::admin.receipt.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New Receipt';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = PaymentCategory::listArray();

        return view('accounts::admin.receipt.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ReceiptRequest $request)
    {
        $data = $request->all();
        $receipt = Receipt::create($data);
        return redirect('accounts/admin/receipts/' . $receipt->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['receipt']          = Receipt::find($id);
        return view('accounts::admin.receipt.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New Receipt';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = PaymentCategory::listArray();

        $this->data['receipt']          = Receipt::find($id);
        return view('accounts::admin.receipt.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ReceiptRequest $request, $id)
    {
        $data                           = $request->all();
        $receipt                        = Receipt::find($id);
        $receipt->date                  = $data['date'];
        $receipt->employees_id          = $data['employees_id'];
        $receipt->payer_id              = $data['payer_id'];
        $receipt->payment_categories_id = $data['payment_categories_id'];
        $receipt->payment_methods_id    = $data['payment_methods_id'];
        $receipt->transaction_number    = $data['transaction_number'];
        $receipt->amount                = $data['amount'];
        $receipt->reason                = $data['reason'];
        $receipt->note                  = $data['note'];
        $receipt->save();

        return redirect('accounts/admin/receipts/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Receipt::find($id)->delete();
        return redirect('accounts/admin/receipts');
    }
}
