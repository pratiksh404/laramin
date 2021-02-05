<?php

namespace Pratiksh\Laramin\Repository;

use Pratiksh\Laramin\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image as Image;
use Pratiksh\Laramin\Http\Requests\SettingRequest;
use Pratiksh\Laramin\Contracts\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    // Setting Index
    public function indexSetting()
    {
        $setting = config('coderz.caching', true)
            ? (Cache::has('setting') ? Cache::get('setting') : Cache::rememberForever('setting', function () {
                return Setting::first();
            }))
            : Setting::first();
        return compact('setting');
    }

    // Setting Create
    public function createSetting()
    {
        //
    }

    // Setting Store
    public function storeSetting(SettingRequest $request)
    {
        $setting = Setting::create($request->validated());
        $this->uploadImage($setting);
    }

    // Setting Show
    public function showSetting(Setting $setting)
    {
        return compact('setting');
    }

    // Setting Edit
    public function editSetting(Setting $setting)
    {
        return compact('setting');
    }

    // Setting Update
    public function updateSetting(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
        $this->uploadImage($setting);
    }

    // Setting Destroy
    public function destroySetting(Setting $setting)
    {
        if ($setting->logo) {
            $setting->hardDelete('logo');
        }
        if ($setting->favicon) {
            $setting->hardDelete('favicon');
        }
        if ($setting->banner) {
            $setting->hardDelete('banner');
        }
        if ($setting->og_image) {
            $setting->hardDelete('og_image');
        }

        $setting->delete();
    }

    protected function uploadImage(Setting $setting)
    {
        if (request()->has('logo')) {

            $setting->update([
                'logo' => request()->logo->store('blog/logo', 'public')
            ]);
            $image = Image::make(request()->file('logo')->getRealPath());
            $image->save(public_path('storage/' . $setting->logo));
        }
        if (request()->og_image) {
            $solo_image = [
                'storage' => 'hms/logo',
                'width' => '600',
                'height' => '600',
                'quality' => '70',
            ];
            $setting->uploadImage('og_image', $solo_image);
        }
        if (request()->favicon) {
            $solo_image = [
                'storage' => 'hms/logo',
                'width' => '100',
                'height' => '100',
                'quality' => '70',
            ];
            $setting->uploadImage('favicon', $solo_image);
        }
        if (request()->banner) {
            $solo_image = [
                'storage' => 'techcoderz/banner',
                'width' => '1920',
                'height' => '1280',
                'quality' => '80',
            ];
            $setting->uploadImage('banner', $solo_image);
        }
    }
}
