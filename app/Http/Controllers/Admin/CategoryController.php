<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Categories();
    }

    public function add()
    {
        return view('admin.category.add', [
            'title' => 'Thêm danh mục',
            'order' => $this->model->max('order') + 1
        ]);
    }
    public function store(Request $request)
    {
       $request->validate(
            ['name' => 'required', 'slug' => 'unique:categories'],
            [
                'name.required' => "Vui lòng nhập tên danh mục",
                'slug.unique' => 'Tên danh mục này đã tồn tại'
            ]
       );

        $newRow = new Categories();
        $newRow->fill($request->input());
        $newRow->save();

       Session::flash('success', 'Đã thêm thành công');
       return Helper::reload();
    }

    public function checkSlug(Request $request)
    {

        $data = $request->slugValue;
        # Kiểm tra slug đó có tồn tại chưa
        $result = $this->model->where('slug', $data)->get();
        if (sizeof($result) == 0) {
            return json_encode([
                'error' => false
            ]);
        }
        return json_encode([
            'error' => true,
            'message' => 'Đã tồn tại, vui lòng chọn tên khác',
            'data' => $result
        ]);
    }

    public function listCategory()
    {
        return view('admin.category.list',[
            'title' => 'Danh sách danh mục',
            'data' => $this->model->all()
        ]);
    }
    public function show($id = 0)
    {
        return view('admin.category.show', [
            'title' => 'Chỉnh sửa trang',
            'data' => $this->model->find($id),
            'order' => $this->model->max('order') + 1
        ]);
    }
    public function update($id = 0, Request $request)
    {
        //bắt buộc nhập tên trang, không nhập thì báo lỗi tự động refresh
        $this->validate($request,
            [   'name' => 'required'],
            [   'name.required' => 'Cập nhật thất bại, Nhập tên trang']
        );

        $this->model->updateOrCreate(['id'=> $id], $request->input());
        Session::flash('success', 'Đã cập nhật thành công');
        return redirect('/admin/category/list');
    }
    public function destroy($id = 0)
    {
        $page = $this->model->find($id);
        if ($page == null) {
            return json_encode([
                'error' => true,
                'message' => 'Không tìm thấy trang cần xoá'
            ]);
        }
        $result = $page->delete();
        if ($result) {
            Session::flash('success', "Xoá trang " . $page->name . " thành công");
            return json_encode([
                'error' => false,
                'message' => 'Xoá thành công'
            ]);
        }

        return json_encode([
            'error' => true,
            'message' => 'Xoá thất bại'
        ]);
    }
}
