<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Bank\Entities\BankAccount;
use Modules\Bank\Entities\Deposit;
use Modules\Bank\Entities\Employee;
use Modules\Bank\Entities\TransactionReason;
use Modules\Bank\Http\Requests\DepositRequest;

class DepositsController extends BankAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Bank';
        $this->data['info']->subMenu    = 'Deposits';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Deposits';
        $this->data['deposits']         = Deposit::orderBy('id', 'desc')->paginate(20);
        return view('bank::admin.deposit.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New Deposit';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['banks']            = BankAccount::listArray();
        $this->data['purposes']         = TransactionReason::listArray();

        return view('bank::admin.deposit.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DepositRequest $request)
    {
        $data       = $request->all();
        $deposit    = Deposit::create($data);
        return redirect('bank/admin/deposits/' . $deposit->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['deposit']          = Deposit::find($id);
        return view('bank::admin.deposit.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New Deposit';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['banks']            = BankAccount::listArray();
        $this->data['purposes']         = TransactionReason::listArray();

        $this->data['deposit']          = Deposit::find($id);
        return view('bank::admin.deposit.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(DepositRequest $request, $id)
    {
        $data                           = $request->all();
        $deposit                        = Deposit::find($id);
        $deposit->date                  = $data['date'];
        $deposit->account_id            = $data['account_id'];
        $deposit->employees_id          = $data['employees_id'];
        $deposit->amount                = $data['amount'];
        $deposit->note                  = $data['note'];
        $deposit->transaction_reason_id = $data['transaction_reason_id'];
        $deposit->save();

        return redirect('bank/admin/deposits/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Deposit::find($id)->delete();
        return redirect('bank/admin/deposits');
    }


}
