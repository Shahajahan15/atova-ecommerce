<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Product\Entities\AttributeGroup;
use Modules\Product\Entities\Product;

class SpecificationsController extends ProductAdminController
{

    public function __construct()
    {
        parent::__construct();

        $this->data['info']->title  = 'Product Specifications';
        $this->data['info']->menu   = 'Products';
        $this->data['info']->subMenu   = 'Products';
    }


    /**
     * Get Specification of a group
     * @param $group_id
     * @return mixed
     */

    public function specificationOfGroup($group_id)
    {
        $attributes = AttributeGroup::find($group_id)->attributes;
        return Response::json($attributes);
    }


    /**
     * Getting specification of a product
     * @param $product_id
     * @return mixed
     */

    public function specificationOfProduct($product_id)
    {
        $specifications = Product::find($product_id)->specifications;
        $i = 0;

        foreach ($specifications as $specification) {
            $specifications[$i]->id = $specification->attribute->id;
            $specifications[$i++]->title = $specification->attribute->title;
        }

        return Response::json($specifications);
    }



}
