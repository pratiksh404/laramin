<?php

namespace Pratiksh\Laramin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pratiksh\Laramin\Models\Setting;
use Pratiksh\Laramin\Http\Requests\SettingRequest;
use Pratiksh\Laramin\Contracts\SettingRepositoryInterface;

class SettingController extends Controller
{
    protected $settingRepositoryInterface;

    public function __construct(SettingRepositoryInterface $settingRepositoryInterface)
    {
        $this->settingRepositoryInterface = $settingRepositoryInterface;
        $this->authorizeResource(Setting::class, 'setting');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laramin::admin.setting.index', $this->settingRepositoryInterface->indexSetting());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laramin::admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Laramin\Http\Requests\SettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $this->settingRepositoryInterface->storeSetting($request);
        return redirect(adminRedirectRoute('setting'))->withSuccess('Setting Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Laramin\Models\Profile  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('laramin::admin.setting.show', $this->settingRepositoryInterface->showSetting($setting));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Laramin\Models\Profile  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('laramin::admin.setting.edit', $this->settingRepositoryInterface->editSetting($setting));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Laramin\Http\Requests\SettingRequest  $request
     * @param  \Pratiksh\Laramin\Models\Profile  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $this->settingRepositoryInterface->updateSetting($request, $setting);
        return redirect(adminRedirectRoute('setting'))->withInfo('Setting Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pratiksh\Laramin\Models\Profile  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $this->settingRepositoryInterface->destroySetting($setting);
        return redirect(adminRedirectRoute('setting'))->withFail('Setting Deleted Successfully.');
    }
}
