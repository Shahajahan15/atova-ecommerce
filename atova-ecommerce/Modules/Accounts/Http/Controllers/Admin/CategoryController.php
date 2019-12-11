<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\PaymentCategory;
use Modules\Accounts\Http\Requests\CategoryRequest;

class CategoryController extends AccountsAdminController
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
        $this->data['categories'] = PaymentCategory::paginate(20);
        return view('accounts::admin.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('accounts::admin.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        PaymentCategory::create($data);
        return redirect('accounts/admin/categories');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode'] = 'edit';
        $this->data['category'] = PaymentCategory::find($id);
        return view('accounts::admin.category.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = PaymentCategory::find($id);
        $category->title = $data['title'];
        $category->note = $data['note'];
        $category->save();

        return redirect('accounts/admin/categories');
    }

}
