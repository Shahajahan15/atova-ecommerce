<?php

namespace Modules\Invest\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Invest\Entities\Employee;
use Modules\Invest\Entities\Invest;
use Modules\Invest\Entities\Investor;
use Modules\Invest\Entities\PaymentMethod;
use Modules\Invest\Http\Requests\InvestRequest;

class InvestsController extends InvestAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Investment';
        $this->data['info']->subMenu    = 'Invests';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Invest';
        $this->data['invests']          = Invest::orderBy('id', 'desc')->paginate(20);
        return view('invest::admin.invest.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New invest';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['investors']        = Investor::listArray();
        $this->data['methods']          = PaymentMethod::arrList();

        return view('invest::admin.invest.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(InvestRequest $request)
    {
        $data       = $request->all();
        $invest     = Invest::create($data);
        return redirect('invest/admin/invests/' . $invest->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['invest']          = Invest::find($id);
        return view('invest::admin.invest.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New invest';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['investors']        = Investor::listArray();
        $this->data['methods']          = PaymentMethod::arrList();

        $this->data['invest']          = Invest::find($id);
        return view('invest::admin.invest.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(InvestRequest $request, $id)
    {
        $data                           = $request->all();
        $invest                         = Invest::find($id);
        $invest->date                   = $data['date'];
        $invest->investors_id           = $data['investors_id'];
        $invest->employee_id            = $data['employee_id'];
        $invest->payment_methods_id     = $data['payment_methods_id'];
        $invest->transaction_number     = $data['transaction_number'];
        $invest->amount                 = $data['amount'];
        $invest->note                   = $data['note'];
        $invest->save();

        return redirect('invest/admin/invests/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Invest::find($id)->delete();
        return redirect('invest/admin/invests');
    }
}
