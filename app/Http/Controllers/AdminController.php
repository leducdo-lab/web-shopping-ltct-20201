<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
  
    public function getIndex() {
        return view('admin.dashboard');
    }
    public function getProduct() {
        return view('admin.list_product');
    }
    public function getUser() {
        return view('admin.list_user');
    }
    public function getAddProduct() {
        return view('admin.add_product');
    }
    public function getSignUp() {
        return view('admin.sign_up');
    //
    public function postRegister(Request $req) {
        $this->validate( $req,
        [
            'email' =>'required|email|unique:persons,email',
            'password'=>'required|min:8',
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu ngắn nhất là 8 ký tự',
        ]);

        $person = new PersonController();

        $person->createPerson($req->email, $req->password, true);
        $person_id = $person->getPersonId($req->email);

        $this->createAdmin(false, $person_id);

        $admin_id = Admin::where('person_id', $person_id)->get();

        return redirect()->route('')->with(['id', $admin_id[0]->id]);

    }

    public function createAdmin($is_main_admin, $person_id) {
        $admin = new Admin();

        $admin->is_main_admin = $is_main_admin;
        $admin->save();
    }
}
