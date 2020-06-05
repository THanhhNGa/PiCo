<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    function GetUser(){
        $data['users']=User::paginate(1);
        return view('backend.user.listuser',$data);
    }
    function GetAddUser(){
        return view('backend.user.adduser');
    }
    function PostAddUser(UserRequest $r){
        // $r->validate([
        //     'email'=>'required|email',
        //     'password'=>'required|min:5',
        //     'name'=>'required|max:60',
        //     'phone'=>'required|max:11',
        //     'address'=>'required',
        // ],[
        //     'email.required'=>'Email không được để trống!',
        //     'email.email'=>'Email không đúng định dạng!',
        //     'password.required'=>'Mật khẩu không được để trống!',
        //     'password.min'=>'Mật khẩu không được ít hơn 5 kí tự!',
        //     'name.required'=>'Tên tài khoản không được để trống!',
        //     // 'name.min'=>'Tên tài khoản không được ít hơn 2 kí tự!',
        //     'name.max'=>'Tên tài khoản không được nhiều hơn 60 kí tự!',
        //     'phone.required'=>'Số điện thoại không được để trống!',
        //     'phone.max'=>'Số điện thoại không được quá 11 số!',
        //     'address.required'=>'Địa chỉ không được để trống!',
        // ]);
        // dd($r->all());
        if(Auth::check()){
            if(Auth::user()->level==0){
                $user=new User;
                $user->email=$r->email;
                $user->password=bcrypt($r->password);
                $user->name=$r->name;
                $user->address=$r->address;
                $user->phone=$r->phone;
                $user->level=$r->level;
                $user->save();
                return redirect('admin/user')->with('thongbao','Đã thêm thành công!');
            }
            else{
                return redirect('admin/user')->with('thongbao','Bạn không được phép thêm tài khoản!');
            }
        }

    }
    function GetEditUser($id){
        $data=User::find($id);
        // dd($data);
        return view('backend.user.edituser',['user'=>$data]);
    }
    function PostEditUser(EditUserRequest $r, $id){
        // dd($r->all());
        // $r->validate([
        //     'email'=>'required|email',

        //     'name'=>'required|max:60',
        //     'phone'=>'required|max:11',
        //     'address'=>'required',
        // ],[
        //     'email.required'=>'Email không được để trống!',
        //     'email.email'=>'Email không đúng định dạng!',


        //     'name.required'=>'Tên tài khoản không được để trống!',
        //     // 'name.min'=>'Tên tài khoản không được ít hơn 2 kí tự!',
        //     'name.max'=>'Tên tài khoản không được nhiều hơn 60 kí tự!',
        //     'phone.required'=>'Số điện thoại không được để trống!',
        //     'phone.max'=>'Số điện thoại không được quá 11 số!',
        //     'address.required'=>'Địa chỉ không được để trống!',
        // ]);
            // $data=User::find($id);
            // dd($data);

            $user=User::find($id);

            $user->email=$r->email;
            if($r->password!="")
            {
                $user->password=bcrypt($r->password);
            }
            $user->name=$r->name;
            $user->address=$r->address;
            $user->phone=$r->phone;
            // $user->level=$r->level;
            $user->save();
            return redirect('admin/user')->with('thongbao','Đã sửa thành công!');
    }
    function DelUser($id)
    {
        if(Auth::check()){
            if(Auth::user()->level==0){
                User::destroy($id);
                return redirect()->back()->with('thongbao','Bạn không có quyền xóa người dùng!');
            }
            else{
                return redirect()->back()->with('thongbao','Bạn không có quyền xóa người dùng!');
            }
        }
    }
}
