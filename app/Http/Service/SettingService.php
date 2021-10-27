<?php
namespace App\Http\Service;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;

class SettingService {
    private $model;

    public function __construct()
    {
        $this->model = new Setting();
    }

    public function get($model)
    {
        $this->model = $model->first();
        return $this->model;
    }
    public function handleSetting($request, $model) : bool
    {
        $getRow = $model->first();
        //Haven't first data
        if ($getRow == NULL) {
            $model->firstOrCreate(['id' => 1], $request->input());
            Session::flash('success', 'Đã tạo mới bảng ghi vào setting');
        } else {  //have a first data then update to that
            $model->updateOrCreate(['id'=> $getRow->id], $request->input());
            Session::flash('success', 'Đã cập nhật thành công');
        }
        return true;
    }

}
