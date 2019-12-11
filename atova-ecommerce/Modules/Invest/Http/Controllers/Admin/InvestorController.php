<?php

namespace Modules\Invest\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Invest\Entities\Employee;
use Modules\Invest\Entities\Investor;
use Modules\Invest\Http\Requests\InvestorRequest;

class InvestorController extends InvestAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Investment';
        $this->data['info']->menu       = 'Investment';
        $this->data['info']->subMenu    = 'Investor';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['investors'] = Investor::paginate(20);
        return view('invest::admin.investor.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['investor'] = Investor::find($id);
        return view('invest::admin.investor.show', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('invest::admin.investor.create', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestorRequest $request)
    {
        $data = $request->all();

        if(Investor::create($data)) {
            Flash::success("Investor Saved Successfully");
            return redirect()->to('invest/admin/investors/');
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
        $this->data['mode']         = 'edit';
        $this->data['investor']     = Investor::find($id);

        return view('invest::admin.investor.create', $this->data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestorRequest $request, $id)
    {
        $data = $request->all();


        $investor = Investor::Find($id);
        $investor->name             = $data['name'];
        $investor->father_name      = $data['father_name'];
        $investor->mother_name      = $data['mother_name'];
        $investor->gender           = $data['gender'];
        $investor->religion         = $data['religion'];
        $investor->date_of_birth    = $data['date_of_birth'];
        $investor->mobile           = $data['mobile'];
        $investor->email            = $data['email'];
        $investor->nid              = $data['nid'];
        $investor->address          = $data['address'];
        $investor->image            = $data['image'];
        $investor->nominee_name     = $data['nominee_name'];
        $investor->nominee_address  = $data['nominee_address'];
        $investor->nominee_mobile   = $data['nominee_mobile'];
        $investor->nominee_nid      = $data['nominee_nid'];
        $investor->nominee_relation = $data['nominee_relation'];
        $investor->nominee_image    = $data['nominee_image'];

        if($investor->save()) {
            Flash::success("investor Saved Successfully");
            return redirect()->to('invest/admin/investors/'.$investor->id);
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
        $investor = Investor::find($id);
        $investor->delete();
        return redirect()->to('invest/admin/investors');
    }
}
