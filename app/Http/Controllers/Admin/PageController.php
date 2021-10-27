<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Service\AdminGeneralService;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    private $model;
    private $table;
    public function __construct()
    {
        $this->model = new Page();
        $this->table = 'pages';
    }

    public function add()
    {
        return view('admin.page.add', [
            'title' => 'Thêm trang vào trang web',
            'order' => $this->model->max('order') + 1
        ]);
    }
    public function store(SettingRequest $request)
    {
        $pageModel = new Page();
        $pageModel->fill($request->input());
        $pageModel->save();
        Session::flash('success', 'Thêm trang thành công');
        return redirect('/admin/page/newpage');
    }
    public function listpage()
    {
        return view('admin.page.list', [
            'title' => 'Danh sách page',
            'data' => $this->model->all()
        ]);
    }
    public function show($id = 0)
    {
        return view('admin.page.show', [
            'title' => 'Chỉnh sửa trang',
            'data' => $this->model->find($id)
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
        return redirect('/admin/page/list');
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

    /**
     * Hàm update nhanh các tham số boolean của bảng
     * @param string $column
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateSelection($column = 'first', $id = 0)
    {
        $updateStatus = new AdminGeneralService($this->model);
        $updateStatus->updateSelection($column, $id);
        return redirect()->back();
    }
}
