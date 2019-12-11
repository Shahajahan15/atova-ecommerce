<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Hr\Entities\Designation;
use Modules\Hr\Http\Requests\CreateDesignationRequest;

class DesignationController extends HrAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Employee Designation';
        $this->data['info']->menu       = 'Human Resource';
        $this->data['info']->subMenu    = 'Designations';
    }


    public function index()
    {
        $this->data['designations'] = Designation::paginate(20);
        return view('hr::admin.designations.index', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('hr::admin.designations.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDesignationRequest $request)
    {
        $data = $request->all();
        if (Designation::create($data))
            return redirect()->to('hr/admin/designations');

        return redirect() - back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['designation'] = Designation::find($id);
        return view('hr::admin.designations.show', $this->data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->data['mode'] = 'edit';
        $this->data['designation'] = Designation::find($id);

        return view('hr::admin.designations.create', $this->data);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDesignationRequest $request, $id)
    {
        $tag = Designation::find($id);
        $tag->title = $request->title;
        if ($tag->save())
            return redirect()->to('hr/admin/designations');

        return redirect() - back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Designation::find($id);
        $tag->delete();


        return redirect()->to('hr/admin/designations');
    }
}
