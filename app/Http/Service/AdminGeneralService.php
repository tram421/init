<?php
namespace App\Http\Service;

use App\Helpers\Helper;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Boolean;

class AdminGeneralService
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function updateSelection($column = 'first', $id = 0)
    {
        //lấy giá trị ở cột
        $row = $this->model->find($id);
        //kiểm tra sự tồn tại
        if ($row) {
            $value = $row->$column; //phải kiểm tra sự tồn tại của bảng ghi rồi mới lấy column được
            //gán giá trị ngược lại
            $row->$column = !$value;
            $row->save();
            Session::flash('success', 'Update thành công');
            return Helper::reload(); //reload lại trang
        }
        Session::flash('error', 'Không tìm thấy dữ liệu');
        return Helper::reload(); //reload lại trang
    }
    public function destroy($id = 0): bool
    {
        $row = $this->model->find($id);
        if ($row == null) {
            return false;
        }
        $result = $row->delete();
        if ($result) {
            Session::flash('success', "Xoá " . $row->name . " thành công");
            return true;
        }

        return false;
    }
}
