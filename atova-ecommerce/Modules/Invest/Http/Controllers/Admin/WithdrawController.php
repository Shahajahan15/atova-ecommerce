<?php

namespace Modules\Invest\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Invest\Entities\Employee;
use Modules\Invest\Entities\Investor;
use Modules\Invest\Entities\PaymentMethod;
use Modules\Invest\Entities\Withdraw;
use Modules\Invest\Http\Requests\WithdrawRequest;

class WithdrawController extends InvestAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Investment';
        $this->data['info']->subMenu    = 'Withdraw';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Withdraw';
        $this->data['withdraws']        = Withdraw::orderBy('id', 'desc')->paginate(20);
        return view('invest::admin.withdraw.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New Withdraw';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['investors']        = Investor::listArray();
        $this->data['methods']          = PaymentMethod::arrList();

        return view('invest::admin.withdraw.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(WithdrawRequest $request)
    {
        $data       = $request->all();
        $withdraw     = Withdraw::create($data);
        return redirect('invest/admin/withdraws/' . $withdraw->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['withdraw']          = Withdraw::find($id);
        return view('invest::admin.withdraw.show', $this->data);
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

        $this->data['withdraw']         = Withdraw::find($id);
        return view('invest::admin.withdraw.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(WithdrawRequest $request, $id)
    {
        $data                           = $request->all();
        $invest                         = Withdraw::find($id);
        $invest->date                   = $data['date'];
        $invest->investors_id           = $data['investors_id'];
        $invest->employee_id            = $data['employee_id'];
        $invest->payment_methods_id     = $data['payment_methods_id'];
        $invest->transaction_number     = $data['transaction_number'];
        $invest->amount                 = $data['amount'];
        $invest->note                   = $data['note'];
        $invest->save();

        return redirect('invest/admin/withdraws/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Withdraw::find($id)->delete();
        return redirect('invest/admin/withdraws');
    }
}
