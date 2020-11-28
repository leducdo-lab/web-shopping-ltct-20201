<?php

namespace App\Http\Controllers;

use App\Accessories_PK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Admin;
use App\Person;
use App\Products;
use App\Orders;
use App\Product_Type;


class AdminController extends Controller
{

    public function getIndex() {
        $persons = Person::all()->count();
        $products = Products::all()->count();
        $orders = Orders::all()->count();
        return view('admin.dashboard')
            ->with(
                [
                    'products' => $products,
                    'orders' => $orders,
                    'persons' => $persons
                ]);

    }
    public function getProduct() {
        $products = Products::paginate(10);
        $products->setPath('list_product/url');
        return view('admin.list_product', ['products' => $products]);
    }
    public function getUser() {
        $users = DB::table('users')
                    ->join('persons', 'users.person_id','=', 'persons.id')
                    ->paginate(10);
        $users->setPath('list_user/url');
        return view('admin.list_user', ['users' => $users]);
    }
    public function getAddProduct() {
        $pro_types = Product_Type::all();
        $phu_kiens = Accessories_PK::all();
        return view('admin.add_product',
            [
                'pro_type' => $pro_types,
                'phu_kien' => $phu_kiens,
            ]);
    }
    public function getSignUp() {
        return view('admin.sign_up');
    }

    public function getEditProduct(Request $req) {
        // $query_string = $req->input('product_id');
        // $product = DB::table('products')->join('product_type', 'products.product_id', '=', 'product_type.id')
        //             ->join('');
    }
    //

    public function postAddProduct(Request $req) {

    }

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

        return redirect()->route('dashboard')->with(['id', $admin_id[0]->id]);

    }

    public function createAdmin($is_main_admin, $person_id) {
        $admin = new Admin();

        $admin->is_main_admin = $is_main_admin;
        $admin->person_id = $person_id;
        $admin->save();
    }
}
