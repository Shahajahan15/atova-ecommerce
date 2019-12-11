<?php

namespace Modules\Receiving\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Receiving\Entities\AddRedClass;
use Modules\Receiving\Entities\Customer;
use Modules\Receiving\Entities\Employee;
use Modules\Receiving\Entities\Invoice;
use Modules\Receiving\Entities\PaymentMethod;
use Modules\Receiving\Entities\Stock;
use Modules\Receiving\Entities\Supplier;
use Modules\Receiving\Http\Requests\CreateInoviceRequest;
use Modules\Receiving\Http\Requests\InvoiceRequest;

class InvoiceController extends ReceivingAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Receiving';
        $this->data['info']->menu       = 'Receiving';
        $this->data['info']->subMenu    = 'Invoices';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['invoices'] = Invoice::orderBy('id', 'desc')->paginate(20);
        return view('receiving::admin.invoices.index', $this->data  );
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
            'purchase' => 'Purchase',
            'return' => 'Sales Return',
            'transfer' => 'Transfer'
        ];

        $this->data['suppliers'] = Supplier::listArray();
        $this->data['customers'] = Customer::listArray();
        $this->data['employees'] = Employee::listArray();

        return view('receiving::admin.invoices.create', $this->data  );
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateInoviceRequest $request)
    {
        $data = $request->all();

        if ($data['type'] == 'transfer') {
            $this->validate($request, [
                'employee_id' => 'required'
            ]);
            $data['users_id'] = $data['employee_id'];
        } elseif($data['type'] == 'purchase') {
            $this->validate($request, [
                'supplier_id' => 'required'
            ]);
            $data['users_id'] = $data['supplier_id'];
        } elseif($data['type'] == 'return') {
            $this->validate($request, [
                'customer_id' => 'required'
            ]);
            $data['users_id'] = $data['customer_id'];
        }

        $data['employees_id'] = $this->data['user']->id;
        $data['date'] = Carbon::now();

        if($inv = Invoice::create($data)) {
            return redirect()->to('receiving/admin/invoices/' . $inv->id .'/edit');
        }

    }


    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('receiving::show');
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
        $this->data['status']           = Invoice::status();

        return view('receiving::admin.invoices.edit', $this->data  );
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
        $invoice->status = $data['status'];

        if($data['status'] == 3) {
            foreach ($invoice->items as $item) {
                $stock = Stock::firstOrCreate(['product_id' => $item->product_id]);
                $stock->quantity += $item->quantity + $item->free;
                $stock->save();
            }
        }
        $invoice->save();

        return redirect()->to('receiving/admin/invoices/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
