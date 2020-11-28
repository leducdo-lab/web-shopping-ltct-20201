<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class UserController extends Controller
{
    public function getRegister_User() {
        return view('page.register');
    }

    public function postRegister_User(Request $req) {
        // dd($req);
        $this->validate($req,
        [
            'email' =>'required|email|unique:persons,email',
            'password'=>'required|min:8',
            'full_name' =>'required',
            'phone'=>'required',
            'address'=>'required'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu ngắn nhất là 8 ký tự',
            'full_name.required'=> 'Vui lòng nhập tên',
            'phone.required'=> 'Vui lòng nhập phone',
            'address' => 'Vui lòng nhập địa chỉ'
        ]);

        $person = new PersonController();

        $person->createPerson($req->email, $req->password, false);
        $person_id = $person->getPersonId($req->email);

        $this->createUser($req->phone, $req->full_name, $person_id);

        $info_user = $this->getInfo($person_id);
        // dd($info_user[0]->id);
        $this->createAddress($req->address, $info_user[0]->id);

        return redirect()->route('home_1')->with(['name'=>$info_user[0]->full_name]);
    }

    public function createUser($phone, $full_name, $person_id) {
        $user = new User();

        $user->full_name = $full_name;
        $user->phone = $phone;
        $user->person_id = $person_id;
        $user->save();
    }

    public function createAddress($in_address, $user_id) {
        $address = new Address();
        // dd($user_id);
        $address->address_name = $in_address;
        $address->user_id = $user_id;
        $address->save();
    }

    public function getInfo($person_id) {
        $info_user = User::select('id', 'full_name')
                    ->where('person_id', $person_id)
                    ->get();
        return $info_user;
    }
}
