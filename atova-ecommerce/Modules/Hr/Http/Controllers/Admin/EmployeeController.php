<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Modules\Hr\Entities\Designation;
use Modules\Hr\Entities\Employee;
use Modules\Hr\Entities\TierType;
use Modules\Hr\Entities\User;
use Modules\Hr\Http\Requests\CreateEmployeeRequest;

class EmployeeController extends HrAdminController
{


    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title  = 'Human Resource';
        $this->data['info']->menu   = 'Human Resource';
        $this->data['info']->subMenu   = 'Employees';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['employees'] = Employee::orderBy('users_id', 'desc')->paginate(20);
        return view('hr::admin.employee.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['employee'] = Employee::find($id);
        return view('hr::admin.employee.show', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        $this->data['designations'] = Designation::designationArray();
        $this->data['tierTypes'] = TierType::tierTypeArray();
        return view('hr::admin.employee.create', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
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

        $user->type                 = "Employee";
        $user->first_name           = $data['first_name'];
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $employee = new Employee();
        $employee->users_id         = $user->id;
        $employee->religion         = $data['religion'];
        $employee->dob              = (empty($data['dob']) ? NULL : $data['dob']);
        $employee->present_address  = $data['present_address'];
        $employee->permanent_address= $data['permanent_address'];
        $employee->post_code        = $data['post_code'];
        $employee->city             = $data['city'];
        $employee->country          = $data['country'];
        $employee->state            = $data['state'];
        $employee->nid              = $data['nid'];
        $employee->employee_id      = $data['employee_id'];
        $employee->designation_id   = $data['designation_id'];
        $employee->qualification    = $data['qualification'];
        $employee->hire_date        = (empty($data['hire_date']) ? NULL : $data['hire_date']);
        $employee->salary           = $data['salary'];
        $employee->tier_types_id    = $data['tier_types_id'];

        if($employee->save()) {
            Flash::success("Employee Saved Successfully");
            return redirect()->to('hr/admin/employees/'.$user->id);
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
        $this->data['employee']     = Employee::find($id);
        $this->data['employee']->first_name = $user->first_name;
        $this->data['employee']->last_name = $user->last_name;
        $this->data['employee']->gender = $user->gender;
        $this->data['employee']->mobile = $user->mobile;
        $this->data['employee']->email = $user->email;
        $this->data['designations'] = Designation::designationArray();
        $this->data['tierTypes']    = TierType::tierTypeArray();

        return view('hr::admin.employee.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmployeeRequest $request, $id)
    {
        $data = $request->all();
        $user = User::Find($id);


        if (Input::file('image')) {
            if (!empty($user->image) && file_exists($user->image)) {
                unlink($user->image);
            }
            $destinationPath        = 'uploads/users/';
            $extension              = Input::file('image')->getClientOriginalExtension();
            $filename               = substr($data['first_name'], 0, 20) . rand(11111,99999). '.'.$extension;
            $user->image            = $destinationPath . $filename;

            Input::file('image')->move($destinationPath, $filename);
        }

        $user->first_name           = $data['first_name'];
        $user->last_name            = $data['last_name'];
        $user->gender               = $data['gender'];
        $user->mobile               = $data['mobile'];
        $user->email                = $data['email'];
        $user->save();

        $employee = Employee::Find($id);
        $employee->users_id         = $user->id;
        $employee->religion         = $data['religion'];
        $employee->dob              = (empty($data['dob']) ? NULL : $data['dob']);
        $employee->present_address  = $data['present_address'];
        $employee->permanent_address= $data['permanent_address'];
        $employee->post_code        = $data['post_code'];
        $employee->city             = $data['city'];
        $employee->country          = $data['country'];
        $employee->state            = $data['state'];
        $employee->nid              = $data['nid'];
        $employee->employee_id      = $data['employee_id'];
        $employee->designation_id   = $data['designation_id'];
        $employee->qualification    = $data['qualification'];
        $employee->hire_date        = (empty($data['hire_date']) ? NULL : $data['hire_date']);
        $employee->salary           = $data['salary'];
        $employee->tier_types_id    = $data['tier_types_id'];

        if($employee->save()) {
            Flash::success("Employee Saved Successfully");
            return redirect()->to('hr/admin/employees/'.$user->id);
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
        $employee = Employee::find($id);
        $user = User::find($id);
        if (!empty($user->image) && file_exists($user->image)) {
            unlink($user->image);
        }
        $employee->delete();
        $user->delete();
        return redirect()->to('hr/admin/employees');
    }
    

}
