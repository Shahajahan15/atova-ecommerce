<?php

namespace Modules\Deliver\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Deliver\Entities\AddRedClass;
use Modules\Deliver\Entities\Customer;
use Modules\Deliver\Entities\Employee;
use Modules\Deliver\Entities\Invoice;
use Modules\Deliver\Entities\InvoiceStatus;
use Modules\Deliver\Entities\PaymentMethod;
use Modules\Deliver\Entities\Stock;
use Modules\Deliver\Entities\Supplier;
use Modules\Deliver\Http\Requests\CreateInvoiceRequest;
use Modules\Deliver\Http\Requests\InvoiceRequest;

class InvoiceController extends DeliverAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Deliver';
        $this->data['info']->menu       = 'Deliver';
        $this->data['info']->subMenu    = 'Invoices';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['invoices'] = Invoice::orderBy('id', 'desc')->paginate(20);
        return view('deliver::admin.invoices.index', $this->data  );
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->subMenu    = 'New Invoice';
        $this->data['mode'] = 'create';

        $this->data['types'] = [
            'sale' => 'Sale',
            'return' => 'Purchase Return',
            'transfer' => 'Transfer'
        ];

        $this->data['suppliers'] = Supplier::listArray();
        $this->data['customers'] = Customer::listArray();
        $this->data['employees'] = Employee::listArray();

        return view('deliver::admin.invoices.create', $this->data  );
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $data                       = $request->all();

        if ($data['type'] == 'transfer') {
            $this->validate($request, [
                'employee_id' => 'required'
            ]);
            $data['users_id'] = $data['employee_id'];
        } elseif($data['type'] == 'return') {
            $this->validate($request, [
                'supplier_id' => 'required'
            ]);
            $data['users_id'] = $data['supplier_id'];
        } elseif($data['type'] == 'sale') {
            $this->validate($request, [
                'customer_id' => 'required'
            ]);
            $data['users_id'] = $data['customer_id'];
        }


        $data['employees_id']       = $this->data['user']->id;
        $data['status']             = '0';
        $data['deliver__status_id'] = 1;
        $data['date']               = Carbon::now();

        if($inv = Invoice::create($data)) {
            return redirect()->to('deliver/admin/invoices/' . $inv->id .'/edit');
        }

    }


    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('deliver::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode']             = 'edit';
        $this->data['invoice']          = Invoice::find($id);
        $this->data['addRedClass']      = AddRedClass::arrList();
        $this->data['paymentMethods']   = PaymentMethod::arrList();
        $this->data['status']           = InvoiceStatus::arrList();

        return view('deliver::admin.invoices.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(InvoiceRequest $request, $id)
    {
        $data = $request->all();
        $invoice = Invoice::find($id);
        $invoice->deliver__status_id = $data['status'];

        $statusInfo = InvoiceStatus::find($data['status']);

        if($invoice->status == 0 && $statusInfo->stock_increase == 1) {
            $invoice->status = '1';
            foreach ($invoice->items as $item) {
                $stock = Stock::firstOrCreate(['product_id' => $item->product_id]);
                $stock->quantity -= ($item->quantity + $item->free);
                $stock->save();
            }
        }

        $invoice->save();

        return redirect()->to('deliver/admin/invoices/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {

    }


}
