<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Hr\Entities\TierType;
use Modules\Hr\Http\Requests\CreateTierTypeRequest;

class TierTypeController extends HrAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Employee TierType';
        $this->data['info']->menu       = 'Human Resource';
        $this->data['info']->subMenu    = 'Tier Types';
    }


    public function index()
    {
        $this->data['TierTypes'] = TierType::paginate(20);
        return view('hr::admin.tiertypes.index', $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        return view('hr::admin.tiertypes.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTierTypeRequest $request)
    {
        $data = $request->all();
        if (TierType::create($data))
            return redirect()->to('hr/admin/tier-types');

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
        $this->data['TierType'] = TierType::find($id);
        return view('hr::admin.tiertypes.show', $this->data);
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
        $this->data['TierType'] = TierType::find($id);

        return view('hr::admin.tiertypes.create', $this->data);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTierTypeRequest $request, $id)
    {
        $tag = TierType::find($id);
        $tag->title = $request->title;
        if ($tag->save())
            return redirect()->to('hr/admin/tier-types');

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
        $tag = TierType::find($id);
        $tag->delete();


        return redirect()->to('hr/admin/tier-types');
    }
}
