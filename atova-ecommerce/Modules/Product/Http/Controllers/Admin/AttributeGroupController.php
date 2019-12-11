<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;
use Modules\Product\Entities\AttributeGroup;
use Modules\Product\Http\Requests\AttributeGroupRequest;

class AttributeGroupController extends ProductAdminController
{

    public function __construct()
    {
        parent::__construct();

        $this->data['info']->title  = 'Product Attributes';
        $this->data['info']->menu   = 'Products';
        $this->data['info']->subMenu   = 'Attributes';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['groups']       = AttributeGroup::orderBy('id', 'desc')->paginate(2);
        return view('product::admin.attribute_group.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode']         = "create";
        return view('product::admin.attribute_group.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeGroupRequest $request)
    {
        $data = $request->all();

        if(AttributeGroup::create($data)) {
            Flash::success("Saved Successfully");
            return redirect()->to('product/admin/attribute-groups');
        }

        return redirect()->back();

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['mode']         = "edit";
        $this->data['group']        = AttributeGroup::find($id);

        return view('product::admin.attribute_group.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeGroupRequest $request, $id)
    {
        $data               = $request->all();
        $group              = AttributeGroup::Find($id);
        $group->title       = $data['title'];

        if($group->save()) {
            Flash::success("Group Saved Successfully");
            return redirect()->to('product/admin/attribute-groups');
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = AttributeGroup::find($id);
        $group->delete();
        return redirect()->to('product/admin/attribute-groups');
    }
}
