<?php

namespace Modules\Settings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\Entities\CompanyInfo;
use Modules\Settings\Http\Requests\CompanyRequest;

class CompanyInfoController extends SettingsAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->title      = 'Company Information';
        $this->data['info']->menu       = 'Settings';
        $this->data['info']->subMenu    = 'Company Info';
    }



    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        $this->data['company'] = CompanyInfo::firstOrCreate(['id' => 1]);
        return view('settings::admin.company.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        $this->data['mode'] = 'edit';
        $this->data['company'] = CompanyInfo::find(1);
        return view('settings::admin.company.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CompanyRequest $request)
    {
        $data                   = $request->all();
        $company                = CompanyInfo::find(1);
        $company->title         = $data['title'];
        $company->email         = $data['email'];
        $company->mobile        = $data['mobile'];
        $company->fax           = $data['fax'];
        $company->address       = $data['address'];
        $company->post_code     = $data['post_code'];
        $company->city          = $data['city'];
        $company->state         = $data['state'];
        $company->country       = $data['country'];
        $company->currency      = $data['currency'];
        $company->logo          = $data['logo'];
        $company->save();

        return redirect()->to('settings/admin/company-info');
    }

}
