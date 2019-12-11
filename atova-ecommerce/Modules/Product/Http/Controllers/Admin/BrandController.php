<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Modules\Product\Entities\Brand;
use Modules\Product\Http\Requests\CreateBrandRequest;

class BrandController extends ProductAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Product Brand';
        $this->data['info']->menu       = 'Products';
        $this->data['info']->subMenu    = 'Brands';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['brands'] = Brand::orderBy('id', 'desc')->paginate(20);
        return view('product::admin.brand.index', $this->data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['brand'] = Brand::find($id);
        return view('product::admin.brand.show', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode'] = "create";
        return view('product::admin.brand.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
        $data = $request->all();

        if (Input::file('image')) {
            $destinationPath    = 'uploads/brands/';
            $extension          = Input::file('image')->getClientOriginalExtension();
            $filename           = substr($data['title'], 0, 20) . rand(11111,99999). '.'.$extension;
            $data['image']       = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }


        if(Brand::create($data)) {
            Flash::success("brand Saved Successfully");
            return redirect()->to('product/admin/brands/');
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
        $this->data['mode']     = "edit";
        $this->data['brand']    = Brand::find($id);

        return view('product::admin.brand.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBrandRequest $request, $id)
    {
        $data = $request->all();
        $brand = Brand::Find($id);


        if (Input::file('image')) {
            if (!empty($brand->image) && file_exists($brand->image)) {
                unlink($brand->image);
            }
            $destinationPath        = 'uploads/brands/';
            $extension              = Input::file('image')->getClientOriginalExtension();
            $filename               = substr($data['title'], 0, 20) . rand(11111,99999). '.'.$extension;
            $brand->image           = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        $brand->title               = $data['title'];
        $brand->description         = $data['description'];
        $brand->country             = $data['country'];

        if($brand->save()) {
            Flash::success("Brand Saved Successfully");
            return redirect()->to('product/admin/brands/'.$brand->id);
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
        $brand = brand::find($id);
        if (!empty($brand->image) && file_exists($brand->image)) {
            unlink($brand->image);
        }
        $brand->delete();
        return redirect()->to('product/admin/brands');
    }




}
