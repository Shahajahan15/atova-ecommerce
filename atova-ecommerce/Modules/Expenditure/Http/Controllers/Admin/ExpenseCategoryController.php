<?php

namespace Modules\Expenditure\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Expenditure\Entities\ExpenseCategory;
use Modules\Expenditure\Http\Controllers\ExpenditureController;
use Modules\Expenditure\Http\Requests\ExpenseCategoryRequest;

class ExpenseCategoryController extends ExpenditureController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->subMenu = 'Categories';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['categories'] = ExpenseCategory::paginate(20);
        return view('expenditure::admin.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('expenditure::admin.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ExpenseCategoryRequest $request)
    {
        $data = $request->all();
        ExpenseCategory::create($data);
        return redirect('expenditure/admin/categories');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode'] = 'edit';
        $this->data['category'] = ExpenseCategory::find($id);
        return view('expenditure::admin.category.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ExpenseCategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = ExpenseCategory::find($id);
        $category->title = $data['title'];
        $category->note = $data['note'];
        $category->save();

        return redirect('expenditure/admin/categories');
    }
}
