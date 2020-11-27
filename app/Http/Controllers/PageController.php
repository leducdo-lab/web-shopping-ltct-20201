<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function getIndex() {
        return view('page.home');
    }

    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $req) {
        $this->validate( $req,
        [
            'email'=>'required|email',
            'password'=>'required|min:8'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự'
        ]);

        $credentials = array('email'=>$req->email, 'password'=>$req->password);

        if(Auth::attempt($credentials))
        {
            $user = DB::table('users')->where('email', $req->email)->first();
            return redirect()->route('home_1')->with(['name'=>$user->fullname]);
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }

    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('home');
    }

}
