<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order_Detail;
use App\Products;
use App\TestProvider\HelloRepository;

class PageController extends Controller
{
    protected $helloRepository;

    public function __construct(HelloRepository $prodRepository)
    {
        $this->helloRepository = $prodRepository;
    }

    public function index()
    {
        $products = $this->helloRepository->showHelloWorld();
        return view('test',['products'=>$products]);
    }

    public function getIndex(Request $req) {

        $cookie = $req->cookie('name');
        $trend = Order_Detail::select('product_id')
                            ->groupBy('product_id')
                            ->limit(8)
                            ->orderBy(DB::raw('COUNT(product_id)'),'desc')
                            ->get();
            $product = array();

        foreach ($trend as $t){

            array_push($product, Products::select('name', 'unit_price', 'url', 'product.id')
                                ->join('image', 'image.product_id','=','product.id')
                                ->where([
                                    ['product.id', '=', $t->product_id],
                                    ['image.main', '=', '1'],
                                ])
                                ->get()
            );
        }

        if(empty($cookie) == false)
            return view('page.home')->with(['name' => $cookie, 'trendings' => $product]);
        else
            return view('page.home')->with(['trendings' => $product]);
    }

    public function getLogin() {
        return view('page.login');
    }

    public function getCart(){
        return view('page.cart');
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
                $user_id_cookie = cookie('user_id', $_user->id, time() +$minutes);
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
