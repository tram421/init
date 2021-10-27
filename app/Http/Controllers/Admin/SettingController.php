<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Service\SettingService;
use App\Models\Setting;

class SettingController extends Controller
{
    private $settingService;
    public function __construct()
    {
        $this->settingService = new SettingService();
    }

    public function settingGeneral(Setting $setting)
    {
        $result = $this->settingService->get($setting);
        return view('admin.setting.general', [
            'title' => 'Cài đặt chung',
            'data' => $result
        ]);
    }
    public function saveSettingGeneral(SettingRequest $settingRequest, Setting $setting)
    {
        $this->settingService->handleSetting($settingRequest, $setting);
        return redirect('admin/setting/general');
    }
    public function settingProduct()
    {
        return view('admin.setting.product', [
           'title' => 'Setting product'
        ]);
    }
    public function systemProduct()
    {
        return view('admin.setting.system', [
            'title' => 'Setting system'
        ]);
    }
}
