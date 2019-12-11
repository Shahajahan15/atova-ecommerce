<?php

namespace Modules\Settings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\Addition;
use Modules\Settings\Http\Requests\CreateAdditionRequest;

class AdditionItemsController extends SettingsAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Reductions';
        $this->data['info']->menu       = 'Settings';
        $this->data['info']->subMenu    = 'Additions';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['additions'] = Addition::orderBy('id', 'desc')->paginate(20);
        return view('settings::admin.additions.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        $this->data['types'] = [
            'percentage'    => 'Percentage',
            'fixed'         => 'Fixed'
        ];

        $this->data['behaviors'] = [
            'addition'    => 'Addition',
            'reduction'   => 'Reduction'
        ];

        $this->data['status'] = [
            '1'    => 'Active',
            '0'    => 'Inactive'
        ];
        return view('settings::admin.additions.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAdditionRequest $request)
    {
        $data = $request->all();
        Addition::create($data);
        return redirect()->to('settings/admin/additions');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $this->data['addition'] = Addition::find($id);
        return view('settings::admin.additions.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->data['mode'] = 'edit';
        $this->data['addition'] = Addition::find($id);
        $this->data['types'] = [
            'percentage'    => 'Percentage',
            'fixed'         => 'Fixed'
        ];

        $this->data['behaviors'] = [
            'addition'    => 'Addition',
            'reduction'   => 'Reduction'
        ];

        $this->data['status'] = [
            '0'    => 'Inactive',
            '1'    => 'Active'
        ];
        return view('settings::admin.additions.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CreateAdditionRequest $request, $id)
    {
        $data                       = $request->all();
        $additoin                   = Addition::find($id);
        $additoin->behavior         = $data['behavior'];
        $additoin->coupon_number    = $data['coupon_number'];
        $additoin->title            = $data['title'];
        $additoin->description      = $data['description'];
        $additoin->type             = $data['type'];
        $additoin->value            = $data['value'];
        $additoin->start_date       = $data['start_date'];
        $additoin->end_date         = $data['end_date'];
        $additoin->status           = $data['status'];
        $additoin->save();

        return redirect()->to('settings/admin/additions');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
