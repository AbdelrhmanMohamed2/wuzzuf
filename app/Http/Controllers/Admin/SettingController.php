<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Traits\UploadFile;

class SettingController extends Controller
{
    use UploadFile;

    public function index($type)
    {
        $all_settings = Setting::where('category', $type)->get();
        return view('dashboard.pages.setting.index', compact('all_settings', 'type'));
    }

    public function create($type)
    {
        return view('dashboard.pages.setting.create', compact('type'));
    }

    public function store(StoreSettingRequest $request, $type)
    {
        Setting::create(['value' => json_encode($request->validated()), 'key' => $type, 'category' => Setting::CREATE_ALLOWED[$type]]);
        toast($type . ' Added successfully', 'success');
        return redirect()->back();
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        if (Setting::ROLES($setting->key) == Setting::ROLES('general')) {
            $value = $request->validated()['value'];
        } elseif ($setting->key == 'site_logo') {
            $value = $this->uploadFile('uploads/images/', $request->image);
        } else {
            $value = json_encode($request->validated());
        }
        $setting->update(['value' => $value]);
        toast('Setting updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Setting $setting, $type)
    {
        $setting->delete();
        toast('Setting Deleted successfully', 'success');
        return redirect()->back();
    }
}
