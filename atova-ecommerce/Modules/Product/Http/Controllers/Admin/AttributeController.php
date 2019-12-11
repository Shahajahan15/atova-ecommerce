<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;
use Modules\Product\Entities\Attribute;
use Modules\Product\Entities\AttributeGroup;
use Modules\Product\Http\Requests\AttributeRequest;

class AttributeController extends ProductAdminController
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
        $this->data['attributes']       = Attribute::orderBy('id', 'desc')->paginate(20);
        return view('product::admin.attribute.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode']         = "create";
        $this->data['groups']       = AttributeGroup::groupList();
        return view('product::admin.attribute.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $data = $request->all();
        $data['order'] = 0;

        if(Attribute::create($data)) {
            Flash::success("Saved Successfully");
            return redirect()->to('product/admin/attributes');
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
        $this->data['attribute']    = Attribute::find($id);
        $this->data['groups']       = AttributeGroup::groupList();

        return view('product::admin.attribute.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $data                                   = $request->all();
        $attribute                              = Attribute::Find($id);
        $attribute->title                       = $data['title'];
        $attribute->attributes_group_id         = $data['attributes_group_id'];

        if($attribute->save()) {
            Flash::success("attribute Saved Successfully");
            return redirect()->to('product/admin/attributes');
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
        $attribute = Attribute::find($id);
        $attribute->delete();
        return redirect()->to('product/admin/attributes');
    }

    
}
