<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    public function getIndex(Request $req) {

        $cookie = $req->cookie('name');

        if(empty($cookie) == false)
            return view('page.home')->with(['name' => $cookie]);
        else
            return view('page.home');
    }

    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $req) {

        $minutes = 1000000060;

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
        $person = new PersonController();

        if(Auth::attempt($credentials))
        {
            $person_id = $person->getPersonId($req->email);
            $user = User::where('person_id', '=', $person_id)->get();

            if(!empty($user[0])) {
                $_user = DB::table('users')
                    ->where('person_id', $person_id)
                    ->first();

                $name_cookie = cookie('name', $_user->full_name, time() +$minutes);
                $user_id_cookie = cookie('user_id', $_user->person_id, time() +$minutes);
                return redirect()->route('info_user')
                    ->withCookie($name_cookie)
                    ->withCookie($user_id_cookie);

            } else {
                $_admin = DB::table('admins')
                    ->join('persons', 'admins.person_id', '=', 'persons.id')
                    ->where('person_id','=',$person_id)
                    ->first();

                $email_cookie = cookie('email', $_admin->email, time() + $minutes);
                $main_admin = cookie('main_admin', ((boolean)$_admin->is_main_admin), time() +$minutes);
//                dd($main_admin);
                return redirect()->route('dashboard')
                    ->withCookie($email_cookie)
                    ->withCookie($main_admin);
            }
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }

    }

    public function getLogout() {

        setcookie('name', '', time()-100);
        setcookie('user_id', '', time()-100);

        Auth::logout();
        return redirect()->route('home');
    }

    public function getProduct(){
        return view('product.product');
    }
    public function getSingle(){
        return view('product.single');
    }
}
