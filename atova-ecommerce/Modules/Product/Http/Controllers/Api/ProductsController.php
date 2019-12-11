<?php

namespace Modules\Product\Http\Controllers\Api;


use Illuminate\Support\Facades\Response;
use Modules\Core\Http\Controllers\CoreAdminController;
use Modules\Product\Entities\Image;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductDetails;



class ProductsController extends CoreAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'New Product';
        $this->data['info']->menu   = 'Products';
        $this->data['info']->subMenu   = 'Products';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($q = '')
    {
        if ($q == '') {
            $this->data['products']     = Product::select('id', 'title', 'model', 'product_code')->take(20)->get();
        } else {
            $this->data['products']     = Product::select('id', 'title', 'model', 'product_code')
                                        ->where('title', 'like', '%'.$q.'%')
                                        ->orWhere('product_code', 'like', '%'.$q.'%')
                                        ->orWhere('barcode', 'like', '%'.$q.'%')
                                        ->orWhere('model', 'like', '%'.$q.'%')
                                        ->take(20)->get();
        }

       return Response::json($this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']          = Product::find($id);
        $this->data['productDetails']   = json_decode($this->data['product']->details->product_details);
        if(empty($this->data['productDetails']))
            $this->data['productDetails'] = array();

        return view('product::admin.product.shows', $this->data);
    }

}
