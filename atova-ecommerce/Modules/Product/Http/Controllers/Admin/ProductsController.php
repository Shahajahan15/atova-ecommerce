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
use Modules\Product\Entities\Supplier;
use Modules\Product\Http\Requests\CreateProductRequest;


class ProductsController extends ProductAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'Product';
        $this->data['info']->menu   = 'Products';
        $this->data['info']->subMenu   = 'Products';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products']     = Product::orderBy('id', 'desc')->paginate(20);
        return view('product::admin.product.index', $this->data);
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
        $this->data['info']->title      = $this->data['product']->title;
        if(isset($this->data['product']->details->product_details)) {
            $this->data['productDetails'] = json_decode($this->data['product']->details->product_details);
        }

        if(empty($this->data['productDetails']))
            $this->data['productDetails'] = array();

        return view('product::admin.product.shows', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']         = 'create';
        $this->data['suppliers']    = Supplier::supplierList();
        $this->data['brands']       = Brand::brandList();
        $this->data['groups']       = AttributeGroup::arrList();
        $this->data['categories']   = Category::categoryList();

        return view('product::admin.product.creates', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $data                   = $request->all();
        $details                = array();
        $i                      = 0;

        foreach($data['field'] as $field) {
            $details[$field]    = $data['value'][$i++];
        }

        $data['users_id']       = $this->data['user']->id;

        $data['thumbnail'] = $this->getThumbsImage($data['image']);

        if($product = Product::create($data))
        {


            // Insert product Categories
            foreach($data['categories'] as $cat_id) {
                $productCategory                = new ProductCategory();
                $productCategory->category_id   = $cat_id;
                $productCategory->product_id    = $product->id;
                $productCategory->save();
            }


            // Insert Product Attributes
            $j=0;
            if(isset($data['sp_id'])) {
                foreach($data['sp_id'] as $id) {
                    $productAttributes = new ProductAttribute();
                    $productAttributes->product_id = $product->id;
                    $productAttributes->attributes_id = $id;
                    $productAttributes->value = $data['sp_value'][$j++];
                    $productAttributes->save();
                }
            }
            $productDetails                     = new ProductDetails();
            $productDetails->product_details    = json_encode($details);
            $productDetails->product_id         = $product->id;
            $productDetails->save();

            // Insert Product Images
            $i = 0;
            foreach($data['images'] as $image) {
                if(!empty($image)) {
                    $productImage                   = new Image();
                    $productImage->product_id       = $product->id;
                    $productImage->image            = $image;
                    $productImage->thumbnail        = $this->getThumbsImage($image);
                    $productImage->sort_order       = $data['sorts'][$i++];
                    $productImage->save();
                }
            }

            Flash::success("Product Saved Successfully");
            return redirect()->to('product/admin/products/' . $product->id);
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
        $this->data['info']->title      = 'Update Product';
        $this->data['mode']             = 'edit';
        $this->data['product']          = Product::find($id);
        $this->data['groups']           = AttributeGroup::arrList();
        $this->data['productDetails']   = json_decode($this->data['product']->details->product_details);
        if(empty($this->data['productDetails']))
            $this->data['productDetails'] = array();

        $this->data['suppliers']        = Supplier::supplierList();
        $this->data['brands']           = Brand::brandList();
        $this->data['categories']       = Category::categoryList();
        $this->data['productCategories']= ProductCategory::where('product_id', $id)->pluck('category_id')->toArray();

        return view('product::admin.product.edit', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateproductRequest $request, $id)
    {
        $data                   = $request->all();
        $details                = array();
        $i                      = 0;

        foreach($data['field'] as $field) {
            $details[$field]    = $data['value'][$i++];
        }

        $product                    = Product::find($id);
        $product->title             = $data['title'];
        $product->description       = $data['description'];
        $product->slug              = $data['slug'];
        $product->meta_tag          = $data['meta_tag'];
        $product->meta_description  = $data['meta_description'];
        $product->ISBN              = $data['ISBN'];
        $product->model             = $data['model'];
        $product->product_code      = $data['product_code'];
        $product->barcode           = $data['barcode'];
        $product->unite             = $data['unite'];
        $product->price             = $data['price'];
        $product->cost_price        = $data['cost_price'];
        $product->supplier_id       = $data['supplier_id'];
        $product->brand_id          = $data['brand_id'];
        $product->image             = $data['image'];
        $product->thumbnail         = $this->getThumbsImage($data['image']);


        if($product->save())
        {
            $productDetails                     = new ProductDetails();
            $productDetails->product_details    = json_encode($details);
            $productDetails->product_id         = $product->id;
            $productDetails->save();

            // Update product Categories
            ProductCategory::where('product_id', $product->id)->delete();
            foreach($data['categories'] as $cat_id) {
                $productCategory                = new ProductCategory();
                $productCategory->category_id   = $cat_id;
                $productCategory->product_id    = $product->id;
                $productCategory->save();
            }

            // Update products specifications
            ProductAttribute::where('product_id', $product->id)->delete();
            if(isset($data['sp_id'])) {
                $j = 0;
                foreach ($data['sp_id'] as $id) {
                    $productAttributes = new ProductAttribute();
                    $productAttributes->product_id = $product->id;
                    $productAttributes->attributes_id = $id;
                    $productAttributes->value = $data['sp_value'][$j++];
                    $productAttributes->save();
                }
            }

            Image::where('product_id', $product->id)->delete();
            $i = 0;
            foreach($data['images'] as $image) {
                if(!empty($image)) {
                    $productImage                   = new Image();
                    $productImage->product_id       = $product->id;
                    $productImage->image            = $image;
                    $productImage->thumbnail        = $this->getThumbsImage($image);
                    $productImage->sort_order       = $data['sorts'][$i++];
                    $productImage->save();
                }
            }

            Flash::success("Product Updated Successfully");
            return redirect()->to('product/admin/products/' . $product->id);
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
        $product = Product::find($id);
        ProductDetails::where('product_id', $id)->delete();
        ProductCategory::where('product_id', $product->id)->delete();
        ProductAttribute::where('product_id', $product->id)->delete();
        Image::where('product_id', $id)->delete();

        $product->delete();

        return redirect()->to('product/admin/products');
    }




    private function getThumbsImage($image)
    {
        $img_arr = explode('/', $image);
        $thumbnail = "";
        for ($i=0; $i<(sizeof($img_arr) - 1); $i++) {
            $thumbnail .= $img_arr[$i];
            $thumbnail .= '/';
        }
        $thumbnail .= 'thumbs/';
        $thumbnail .= end($img_arr);

        return $thumbnail;
    }


}
