<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Modules\Product\Entities\Category;
use Modules\Product\Http\Requests\CreateCategoryRequest;

class CategoryController extends ProductAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Product category';
        $this->data['info']->menu       = 'Products';
        $this->data['info']->subMenu    = 'Categories';
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['categories'] = Category::orderBy('id', 'desc')->paginate(20);
        return view('product::admin.category.index', $this->data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['category'] = Category::find($id);
        return view('product::admin.category.show', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode']         = "create";
        $this->data['categories']   = Category::categoryList();
        return view('product::admin.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->all();

        if (Input::file('image')) {
            $destinationPath    = 'uploads/categories/';
            $extension          = Input::file('image')->getClientOriginalExtension();
            $filename           = substr($data['title'], 0, 20) . rand(11111,99999). '.'.$extension;
            $data['image']       = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        if(empty($data['parent_id']))
            $data['parent_id'] = NULL;

        if(category::create($data)) {
            Flash::success("Category Saved Successfully");
            return redirect()->to('product/admin/categories/');
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
        $this->data['category']     = Category::find($id);
        $this->data['categories']   = Category::categoryList();

        return view('product::admin.category.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatecategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::Find($id);


        if (Input::file('image')) {
            if (!empty($category->image) && file_exists($category->image)) {
                unlink($category->image);
            }
            $destinationPath            = 'uploads/categories/';
            $extension                  = Input::file('image')->getClientOriginalExtension();
            $filename                   = substr($data['title'], 0, 20) . rand(11111,99999). '.'.$extension;
            $category->image            = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        $category->title                = $data['title'];
        $category->description          = $data['description'];
        $category->parent_id            = $data['parent_id'];

        if($category->save()) {
            Flash::success("Category Saved Successfully");
            return redirect()->to('product/admin/categories/'.$category->id);
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
        $category = Category::find($id);
        if (!empty($category->image) && file_exists($category->image)) {
            unlink($category->image);
        }
        $category->delete();
        return redirect()->to('product/admin/categories');
    }

}
