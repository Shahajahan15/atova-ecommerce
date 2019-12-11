<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Response;
use Modules\Frontend\Entities\Product;
use Modules\Frontend\Entities\ProductCategory;
use Modules\Product\Entities\Category;

class ProductController extends CoreFrontendController
{

    /**
     * Show Product list
     */

    public function index($cat_id = 0, $slug = '')
    {
        if($cat_id > 0) {
            $cat_ids = Category::where('parent_id', '=', $cat_id)->orWhere('id', '=', $cat_id)->pluck('id');
            $productsId = ProductCategory::whereIn('category_id', $cat_ids)->pluck('product_id');
            $this->data['products'] = Product::whereIn('id', $productsId)->paginate(12);
        } else {
            $this->data['products'] = Product::paginate(12);
        }

        return $this->loadView('products.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id, $slug)
    {
        $this->data['product'] = Product::find($id);

        return $this->loadView('products.single');
    }


}
