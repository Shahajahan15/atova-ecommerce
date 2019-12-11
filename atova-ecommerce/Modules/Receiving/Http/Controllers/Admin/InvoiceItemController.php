<?php

namespace Modules\Receiving\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Receiving\Entities\Product;
use Modules\Receiving\Http\Requests\InvoiceItemRequest;
use Response;
use Illuminate\Routing\Controller;
use Modules\Receiving\Entities\InvoiceItem;

class InvoiceItemController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($invoice_id)
    {
        $data = array();
        $data['items'] = InvoiceItem::select('receiving__invoice_item.*', 'product.title', 'product.product_code')
                        ->join('product', 'receiving__invoice_item.product_id', '=', 'product.id')
                        ->where('receiving__invoice_item.receiving__invoice_id', $invoice_id)
                        ->orderBy('id', 'asc')
                        ->get();
        $data['total'] = 0;
        foreach ($data['items'] as $item) {
            $data['total'] += $item->total;
        }

        return Response::json($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('receiving::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(InvoiceItemRequest $request)
    {
        $data                               = $request->all();
        $product                            = Product::find($data['product_id']);
        $invoiceItem                        = new InvoiceItem();
        $invoiceItem->product_id            = $data['product_id'];
        $invoiceItem->receiving__invoice_id = $data['receiving__invoice_id'];
        $invoiceItem->quantity              = 1;
        $invoiceItem->free                  = 0;
        $invoiceItem->price                 = $product->cost_price;
        $invoiceItem->discount              = 0;
        $invoiceItem->total                 = $product->cost_price;
        $invoiceItem->save();

        $invoiceItem->title                 = $product->title;
        $invoiceItem->product_code          = $product->product_code;

        return $invoiceItem;
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('receiving::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('receiving::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(InvoiceItemRequest $request, $id)
    {
        $data                        = $request->all();
        $invoiceItem                        = InvoiceItem::find($id);
        $invoiceItem->quantity              = $data['quantity'];
        $invoiceItem->free                  = $data['free'];
        $invoiceItem->price                 = $data['price'];
        $invoiceItem->discount              = $data['discount'];
        $invoiceItem->total                 = ($data['price'] * $data['quantity']) - $data['discount'];
        $invoiceItem->save();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $item = InvoiceItem::find($id);

        if($item->delete()) {
            return 1;
        } else {
            return 0;
        }
    }


}
