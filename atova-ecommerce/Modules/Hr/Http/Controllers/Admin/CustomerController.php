<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Modules\Hr\Entities\Customer;
use Modules\Hr\Entities\ShippingAddress;
use Modules\Hr\Entities\TierType;
use Modules\Hr\Entities\User;
use Modules\Hr\Http\Requests\CreateCustomerRequest;

class CustomerController extends HrAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'Human Resource';
        $this->data['info']->menu   = 'Human Resource';
        $this->data['info']->subMenu   = 'Customers';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['customers'] = Customer::orderBy('users_id', 'desc')->paginate(20);
        return view('hr::admin.customer.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['customer'] = Customer::find($id);
        return view('hr::admin.customer.show', $this->data);
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
        return view('hr::admin.customer.create', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
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
        $user->type                 = "Customer";
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $customer = new Customer();
        $customer->users_id         = $user->id;
        $customer->present_address  = $data['present_address'];
        $customer->permanent_address= $data['permanent_address'];
        $customer->post_code        = $data['post_code'];
        $customer->city             = $data['city'];
        $customer->country          = $data['country'];
        $customer->state            = $data['state'];

        $customer->company_name     = $data['company_name'];
        $customer->company_phone    = $data['company_phone'];
        $customer->company_mobile   = $data['company_mobile'];
        $customer->company_fax      = $data['company_fax'];
        $customer->company_address  = $data['company_address'];
        $customer->tier_types_id    = $data['tier_types_id'];


        $shippingAddress = new ShippingAddress();
        $shippingAddress->users_id              = $user->id;
        $shippingAddress->sa_first_name         = $data['sa_first_name'];
        $shippingAddress->sa_last_name          = $data['sa_last_name'];
        $shippingAddress->sa_mobile             = $data['sa_mobile'];
        $shippingAddress->sa_present_address    = $data['sa_present_address'];
        $shippingAddress->sa_permanent_address  = $data['sa_permanent_address'];
        $shippingAddress->sa_post_code          = $data['sa_post_code'];
        $shippingAddress->sa_city               = $data['sa_city'];
        $shippingAddress->sa_country            = $data['sa_country'];
        $shippingAddress->sa_state              = $data['sa_state'];

        if($customer->save()) {
            $shippingAddress->save();
            Flash::success("customer Saved Successfully");
            return redirect()->to('hr/admin/customers/'.$user->id);
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
        $this->data['customer']     = Customer::find($id);
        $this->data['customer']->first_name = $user->first_name;
        $this->data['customer']->last_name = $user->last_name;
        $this->data['customer']->gender = $user->gender;
        $this->data['customer']->mobile = $user->mobile;
        $this->data['customer']->email = $user->email;
        $this->data['tierTypes']    = TierType::tierTypeArray();

        return view('hr::admin.customer.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatecustomerRequest $request, $id)
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
        $user->type                 = "Customer";
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $customer = Customer::find($id);
        $customer->users_id         = $user->id;
        $customer->present_address  = $data['present_address'];
        $customer->permanent_address= $data['permanent_address'];
        $customer->post_code        = $data['post_code'];
        $customer->city             = $data['city'];
        $customer->country          = $data['country'];
        $customer->state            = $data['state'];

        $customer->company_name     = $data['company_name'];
        $customer->company_phone    = $data['company_phone'];
        $customer->company_mobile   = $data['company_mobile'];
        $customer->company_fax      = $data['company_fax'];
        $customer->company_address  = $data['company_address'];
        $customer->tier_types_id    = $data['tier_types_id'];


        $shippingAddress = ShippingAddress::find($id);
        $shippingAddress->users_id             = $user->id;
        $shippingAddress->sa_first_name        = $data['sa_first_name'];
        $shippingAddress->sa_last_name         = $data['sa_last_name'];
        $shippingAddress->sa_mobile            = $data['sa_mobile'];
        $shippingAddress->sa_present_address  = $data['sa_present_address'];
        $shippingAddress->sa_permanent_address= $data['sa_permanent_address'];
        $shippingAddress->sa_post_code        = $data['sa_post_code'];
        $shippingAddress->sa_city             = $data['sa_city'];
        $shippingAddress->sa_country          = $data['sa_country'];
        $shippingAddress->sa_state            = $data['sa_state'];
        $shippingAddress->save();

        if($customer->save()) {
            Flash::success("customer Saved Successfully");
            return redirect()->to('hr/admin/customers/'.$user->id);
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
        $customer = Customer::find($id);
        $user = User::find($id);
        if (!empty($user->image) && file_exists($user->image)) {
            unlink($user->image);
        }
        $customer->delete();
        $user->delete();
        return redirect()->to('hr/admin/customers');
    }
}
