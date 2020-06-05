<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use DB;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    function GetLogin() {
        return view('backend.login');
    }
    function PostLogin(LoginRequest $r) {

        if(Auth::attempt(['email' => $r->email, 'password' => $r->pass])){
            return redirect('admin');
        }
        else{
            return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu chưa chính xác!');
        }
    }
    function GetIndex(){
        return view('backend.index');
    }
    function Logout(){
        Auth::logout();
        return redirect('login');
    }
}
