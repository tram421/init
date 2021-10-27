<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopContent;
use Illuminate\Support\Facades\Session;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = TopContent::first();
        return response()->view('admin.top', [
            'title' => 'Chỉnh sửa hình đầu trang home',
            'data' => $result,
//            'errors' => Session::get('errors')
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'main_content' => 'required',
            'mini_content' => 'required',
            'content_button' => 'required',
            'url_button' => 'required'
        ], [
            'image.required' => 'Vui Lòng chọn file ảnh kích thước: 1400px : 463px',
            'main_content.required' => 'vui lòng nhập nội dung chính',
            'mini_content.required' => 'vui lòng nhập nội dung phụ',
            'content_button.required' => 'vui lòng nhập nội dung nút nhấn',
            'url_button.required' => 'vui lòng nhập đường dẫn chuyển tới trang',
        ]);
        $row = TopContent::first();
        $row->fill($request->input());
        $row->save();
        Session::flash('success', 'Đã update thành công');
        return Helper::reload();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
