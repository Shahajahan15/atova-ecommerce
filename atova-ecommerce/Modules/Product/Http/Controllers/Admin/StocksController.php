<?php

namespace Modules\Product\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Product\Entities\Attribute;
use Modules\Product\Entities\AttributeGroup;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Image;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductDetails;
use Modules\Product\Entities\Stock;
use Modules\Product\Entities\Supplier;
use Modules\Product\Http\Requests\CreateProductRequest;


class StocksController extends ProductAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'Product';
        $this->data['info']->menu   = 'Products';
        $this->data['info']->subMenu   = 'Stock';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['stocks']     = Stock::orderBy('id', 'desc')->paginate(20);
        return view('product::admin.product.stock', $this->data);
    }


}
