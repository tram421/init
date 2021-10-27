<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login',[
           'title'=>'Đăng nhập trang admin'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email:filter',
           'password' => 'required'
        ],[
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Sai định dạng email',
            'password.required' => 'Mật khẩu không được bỏ trống'
        ]);
       if(Auth::attempt([
           'email' => $request->input('email'),
           'password' => $request->input('password')
       ], $request->input('remember'))) {
           return redirect('/admin/main');
       }

       return redirect()->back();
    }
}
