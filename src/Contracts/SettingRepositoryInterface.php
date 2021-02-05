<?php

namespace Pratiksh\Laramin\Contracts;

use Pratiksh\Laramin\Models\Setting;
use Pratiksh\Laramin\Http\Requests\SettingRequest;

interface SettingRepositoryInterface
{
    public function indexSetting();

    public function createSetting();

    public function storeSetting(SettingRequest $request);

    public function showSetting(Setting $Setting);

    public function editSetting(Setting $Setting);

    public function updateSetting(SettingRequest $request, Setting $Setting);

    public function destroySetting(Setting $Setting);
}
