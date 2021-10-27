<?php
namespace App\Http\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $extension = $file->clientExtension();
        #nếu không là image sẽ trả về false
        $is_image = getimagesize($file->getRealPath());
        $size = $file->getSize();
//        dd($size);
        #Kiểm tra phải file ảnh không
        if ($is_image == false) {
            return [
                'error'=>true,
                'message'=>'Vui lòng chọn file ảnh'
            ];
        }
        #kiểm tra kích thước ảnh không quá lớn nhỏ hơn 1kb và lớn hơn 300kb
        if ($size < 1000 || $size > 300000) {
            return [
                'error'=>true,
                'message'=>'Vui lòng chọn file ảnh có kích thước từ 1KB đến 300KB'
            ];
        }
        #Kiểm tra extension
        $typeArray = ['jpg', 'jpeg', 'jpe', 'png', 'gif', 'svg'];
        if (in_array($extension, $typeArray) == false) {
            return [
                'error'=>true,
                'message'=>"Vui lòng chọn file ảnh có định dạng: jpg, jpeg, jpe, png, gif, svg"
            ];
        }
        $path = 'uploads/'.date('Y/m/d') . '/';

        $result = $request->file('file')->storeAs('public/'. $path,$name);

        return [
            'error' => false,
            'message' => 'Up load thành công',
            'path' => '/storage/'.$path . $name
        ];
    }
}
