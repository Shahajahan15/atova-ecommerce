<?php

namespace Modules\Bank\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Bank\Entities\BankAccount;
use Modules\Bank\Entities\Employee;
use Modules\Bank\Http\Requests\AccountRequest;

class BankAccountsController extends BankAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Bank';
        $this->data['info']->subMenu    = 'Accounts';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Accounts';
        $this->data['accounts']         = BankAccount::orderBy('id', 'desc')->paginate(20);
        return view('bank::admin.account.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->thirdMenu  = 'New Account';
        $this->data['mode']             = 'create';
        return view('bank::admin.account.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(AccountRequest $request)
    {
        $data       = $request->all();
        $account    = BankAccount::create($data);
        return redirect('bank/admin/accounts/' . $account->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['account']          = BankAccount::find($id);
        return view('bank::admin.account.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New account';
        $this->data['mode']             = 'edit';

        $this->data['account']          = BankAccount::find($id);
        return view('bank::admin.account.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(AccountRequest $request, $id)
    {
        $data                           = $request->all();
        $account                        = BankAccount::find($id);
        $account->bank_name                  = $data['bank_name'];
        $account->account_no          = $data['account_no'];
        $account->branch          = $data['branch'];
        $account->account_type          = $data['account_type'];
        $account->description   = $data['description'];
        $account->save();

        return redirect('bank/admin/accounts/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        BankAccount::find($id)->delete();
        return redirect('bank/admin/accounts');
    }

}
