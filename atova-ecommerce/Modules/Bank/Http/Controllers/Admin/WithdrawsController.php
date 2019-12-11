<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Bank\Entities\BankAccount;
use Modules\Bank\Entities\Employee;
use Modules\Bank\Entities\TransactionReason;
use Modules\Bank\Entities\Withdraw;
use Modules\Bank\Http\Requests\WithdrawRequest;

class WithdrawsController extends BankAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Bank';
        $this->data['info']->subMenu    = 'Withdraws';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Withdraws';
        $this->data['withdraws']         = Withdraw::orderBy('id', 'desc')->paginate(20);
        return view('bank::admin.withdraw.index', $this->data);
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
        $this->data['banks']            = BankAccount::listArray();
        $this->data['purposes']         = TransactionReason::listArray();

        return view('bank::admin.withdraw.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(WithdrawRequest $request)
    {
        $data       = $request->all();
        $withdraw    = Withdraw::create($data);
        return redirect('bank/admin/withdraws/' . $withdraw->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['info']->thirdMenu  = 'Withdraws';
        $this->data['withdraw']         = Withdraw::find($id);
        return view('bank::admin.withdraw.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New Withdraw';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['banks']            = BankAccount::listArray();
        $this->data['purposes']         = TransactionReason::listArray();

        $this->data['withdraw']          = Withdraw::find($id);
        return view('bank::admin.withdraw.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(WithdrawRequest $request, $id)
    {
        $data                           = $request->all();
        $withdraw                        = Withdraw::find($id);
        $withdraw->date                  = $data['date'];
        $withdraw->account_id            = $data['account_id'];
        $withdraw->employees_id          = $data['employees_id'];
        $withdraw->amount                = $data['amount'];
        $withdraw->note                  = $data['note'];
        $withdraw->transaction_reason_id = $data['transaction_reason_id'];
        $withdraw->save();

        return redirect('bank/admin/withdraws/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Withdraw::find($id)->delete();
        return redirect('bank/admin/withdraws');
    }


}
