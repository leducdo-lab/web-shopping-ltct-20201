<?php

namespace HT\Admin\Http\Controller;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Admin;
use App\Person;
use App\Products;
use App\Orders;


class AdminController extends Controller
{

    public function getIndex() {

        $persons = Person::all()->count();
        $products = Products::all()->count();
        $orders = Orders::all()->count();

        if(Auth::check()) {
            return view('admin.dashboard')
            ->with(
                [
                    'products' => $products,
                    'orders' => $orders,
                    'persons' => $persons
                ]);
        }else {
            return view('admin.dashboard')
            ->with(
                [
                    'products' => $products,
                    'orders' => $orders,
                    'persons' => $persons
                ]);
        }

    }

    public function createPerson($email, $password, $is_admin) {
        $person = new Person();
        $person->email = $email;
        $person->password = Hash::make($password);
        $person->is_admin = $is_admin;
        $person->save();
    }

    public function getPersonId($email) {
        $id = Person::select('id')->where('email', $email)->get();
        return $id[0]->id;
    }

    public function logoutAdmin(Request $req) {
        if (Cookie::has('email') && Cookie::has('main_admin')) {
            Cookie::forget('email');
            Cookie::forget('main_admin');
            Auth::logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

    public function getListProduct() {
        $products = Products::paginate(20);
        return view('admin.list_product', ['products' => $products]);
    }

    public function getUser() {
        $users = DB::table('users')
                    ->join('persons', 'users.person_id','=', 'persons.id')
                    ->paginate(15);

        return view('admin.list_user', ['users' => $users]);
    }

    public function getListAdmin()
    {
        $admins = DB::table('persons')->join('admins', 'admins.person_id', '=', 'persons.id')
                    ->paginate(15);

        $data['main'] = 'Quản lý chính';
        $data['non_main'] = 'Quản lý phụ';

        return view('admin.list_admin', [
            'admins' => $admins,
            'data'=> $data,
            ]);
    }

// Giúp việc đăng ký admin.
    public function getSignUp()
    {
        return view('admin.sign_up');
    }

    public function postSignup(Request $req) {

        $this->validate( $req,
        [
            'email' =>'required|email|unique:persons,email',
            'password'=>'required|min:8',
            're_password' =>'required|same:password'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không đúng định dạng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu ngắn nhất là 8 ký tự',
            're_password.required'=> 'Vui lòng nhập lại xác nhận mật khẩu',
            're_password.same'=> 'Mật khẩu không trùng nhau'
        ]);

        $this->createPerson($req->email, $req->password, true);
        $person_id = $this->getPersonId($req->email);

        if((bool)$req->is_admin)
            $this->createAdmin(true, $person_id);
        else
            $this->createAdmin(false, $person_id);

        $admin = Admin::join('persons', 'admins.person_id', '=', 'persons.id')->where('person_id','=',$person_id)->get();


        return redirect()->route('dashboard')->with(['email', $admin[0]->email]);

    }

// lấy trang edit admin.
    public function getEditAdmin(Request $req) {

        $admin_id = $req->input('admin');
        $quyen = (boolean) $req->input('quyen');

        Admin::where('id', $admin_id)->update(['is_main_admin' => $quyen]);

        return redirect()->route('list_admin')->with(['success'=>'success','message'=>'Sửa quyền thành công']);
    }

// xoa admin
    public function getRemoveAdmin(Request $req) {

        $person_id = $req->input('admin');
        $person_id = (int)$person_id;

        $person = Person::find($person_id);
        $person->delete();

        return redirect()->back();
    }

    public function createAdmin($is_main_admin, $person_id) {
        $admin = new Admin();

        $admin->is_main_admin = $is_main_admin;
        $admin->person_id = $person_id;
        $admin->save();
    }

    public function getOrderList() {
        $orders = DB::table('orders')
            ->select('orders.id', 'orders.status', 'orders.total', 'orders.note',
            'users.full_name', 'users.phone', 'address.address_name', 'order_details.amount',
            'product.name')
            ->join('users', 'users.id', '=','orders.user_id')
            ->join('address', 'address.id', '=', 'orders.address_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('product', 'product.id', '=', 'order_details.product_id')
            ->orderByDesc('orders.id')
            ->get();

        return view('admin.list_order', [
            'orders' => $orders
        ]);
    }

    public function postOrder(Request $req) {

        $id = $req->order_id;
        $status = $req->status;

        $order = Orders::find($id);

        $order->status = $status;

        $order->save();

        return redirect()->back()->with(['success'=>'success', 'message'=>'Sửa thành công']);

    }

}
