<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Persons;

class UserController extends Controller
{
    public function getRegister_User() {
        return view('page.register');
    }

    public function postRegister_User(Request $req) {
        $this->validate($req,
        [
            'email' =>'required|email|unique:persons,email',
            'password'=>'required|min:8',
            'fullname' =>'required',
            'phone'=>'required'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu ngắn nhất là 8 ký tự',
            'fullname.required'=> 'Vui lòng nhập tên',
            'phone.required'=> 'Vui lòng nhập phone'
        ]);
    }
}
