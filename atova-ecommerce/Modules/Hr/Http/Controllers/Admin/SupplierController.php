<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Modules\Hr\Entities\Supplier;
use Modules\Hr\Entities\TierType;
use Modules\Hr\Entities\User;
use Modules\Hr\Http\Requests\CreateSupplierRequest;

class SupplierController extends HrAdminController
{

    
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'Human Resource';
        $this->data['info']->menu   = 'Human Resource';
        $this->data['info']->subMenu   = 'Suppliers';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['suppliers'] = Supplier::orderBy('users_id', 'desc')->paginate(20);
        return view('hr::admin.supplier.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['supplier'] = Supplier::find($id);
        return view('hr::admin.supplier.show', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        $this->data['tierTypes'] = TierType::tierTypeArray();
        return view('hr::admin.supplier.create', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $data = $request->all();
        $user = new User();

        if (Input::file('image')) {
            $destinationPath    = 'uploads/users/';
            $extension          = Input::file('image')->getClientOriginalExtension();
            $filename           = substr($data['first_name'], 0, 20) . rand(11111,99999). '.'.$extension;
            $user->image        = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        $user->first_name           = $data['first_name'];
        $user->type                 = "supplier";
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $supplier = new Supplier();
        $supplier->users_id         = $user->id;
        $supplier->present_address  = $data['present_address'];
        $supplier->permanent_address= $data['permanent_address'];
        $supplier->post_code        = $data['post_code'];
        $supplier->city             = $data['city'];
        $supplier->country          = $data['country'];
        $supplier->state            = $data['state'];

        $supplier->company_name     = $data['company_name'];
        $supplier->company_phone    = $data['company_phone'];
        $supplier->company_mobile   = $data['company_mobile'];
        $supplier->company_fax      = $data['company_fax'];
        $supplier->company_address  = $data['company_address'];
        $supplier->tier_types_id    = $data['tier_types_id'];

        if($supplier->save()) {
            Flash::success("supplier Saved Successfully");
            return redirect()->to('hr/admin/suppliers/'.$user->id);
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
        $user                       = User::find($id);
        $this->data['mode']         = 'edit';
        $this->data['supplier']     = Supplier::find($id);
        $this->data['supplier']->first_name = $user->first_name;
        $this->data['supplier']->last_name = $user->last_name;
        $this->data['supplier']->gender = $user->gender;
        $this->data['supplier']->mobile = $user->mobile;
        $this->data['supplier']->email = $user->email;
        $this->data['tierTypes']    = TierType::tierTypeArray();

        return view('hr::admin.supplier.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSupplierRequest $request, $id)
    {

        $data = $request->all();
        $user = User::find($id);

        if (Input::file('image')) {
            if (!empty($user->image) && file_exists($user->image)) {
                unlink($user->image);
            }
            $destinationPath    = 'uploads/users/';
            $extension          = Input::file('image')->getClientOriginalExtension();
            $filename           = substr($data['first_name'], 0, 20) . rand(11111,99999). '.'.$extension;
            $user->image        = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        $user->first_name           = $data['first_name'];
        $user->type                 = "supplier";
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $supplier = supplier::find($id);
        $supplier->users_id         = $user->id;
        $supplier->present_address  = $data['present_address'];
        $supplier->permanent_address= $data['permanent_address'];
        $supplier->post_code        = $data['post_code'];
        $supplier->city             = $data['city'];
        $supplier->country          = $data['country'];
        $supplier->state            = $data['state'];

        $supplier->company_name     = $data['company_name'];
        $supplier->company_phone    = $data['company_phone'];
        $supplier->company_mobile   = $data['company_mobile'];
        $supplier->company_fax      = $data['company_fax'];
        $supplier->company_address  = $data['company_address'];
        $supplier->tier_types_id    = $data['tier_types_id'];

        if($supplier->save()) {
            Flash::success("supplier Saved Successfully");
            return redirect()->to('hr/admin/suppliers/'.$user->id);
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
        $supplier = Supplier::find($id);
        $user = User::find($id);
        if (!empty($user->image) && file_exists($user->image)) {
            unlink($user->image);
        }
        $supplier->delete();
        $user->delete();
        return redirect()->to('hr/admin/suppliers');
    }


}
