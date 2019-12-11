<?php

namespace Modules\Expenditure\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Expenditure\Entities\Employee;
use Modules\Expenditure\Entities\Expense;
use Modules\Expenditure\Entities\ExpenseCategory;
use Modules\Expenditure\Entities\PaymentMethod;
use Modules\Expenditure\Entities\User;
use Modules\Expenditure\Http\Controllers\ExpenditureController;
use Modules\Expenditure\Http\Requests\ExpenseRequest;

class ExpenseController extends ExpenditureController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->subMenu    = 'Expenses';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['info']->thirdMenu  = 'Expenses';
        $this->data['expenses']         = Expense::orderBy('id', 'desc')->paginate(20);
        return view('expenditure::admin.expense.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['info']->subMenu    = 'New Expense';
        $this->data['mode']             = 'create';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = ExpenseCategory::listArray();

        return view('expenditure::admin.expense.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ExpenseRequest $request)
    {
        $data = $request->all();
        $expense = Expense::create($data);
        return redirect('expenditure/admin/expenses/' . $expense->id);
    }


    /**
     * Show details
     * @param $id
     */
    public function show($id)
    {
        $this->data['expense']          = Expense::find($id);
        return view('expenditure::admin.expense.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['info']->thirdMenu  = 'New Expense';
        $this->data['mode']             = 'edit';
        $this->data['employees']        = Employee::listArray();
        $this->data['users']            = User::listArray();
        $this->data['methods']          = PaymentMethod::arrList();
        $this->data['categories']       = ExpenseCategory::listArray();

        $this->data['expense']          = Expense::find($id);
        return view('expenditure::admin.expense.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ExpenseRequest $request, $id)
    {
        $data                           = $request->all();
        $expense                        = Expense::find($id);
        $expense->date                  = $data['date'];
        $expense->employees_id          = $data['employees_id'];
        $expense->recipient_id          = $data['recipient_id'];
        $expense->expense_category_id = $data['expense_category_id'];
        $expense->payment_methods_id    = $data['payment_methods_id'];
        $expense->transaction_number    = $data['transaction_number'];
        $expense->amount                = $data['amount'];
        $expense->reason                = $data['reason'];
        $expense->note                  = $data['note'];
        $expense->save();

        return redirect('expenditure/admin/expenses/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Expense::find($id)->delete();
        return redirect('expenditure/admin/expenses');
    }
}
