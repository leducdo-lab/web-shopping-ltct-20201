<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Order_Detail;
use App\Orders;
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



    // public function getLogout() {

    //     setcookie('name', '', time()-100);
    //     setcookie('user_id', '', time()-100);

    //     Auth::logout();
    //     return redirect()->route('home');
    // }

    public function getProduct(){
        return view('product.product');
    }
    public function getSingle(){
        return view('product.single');
    }

    public function getOrderInformation(Request $req) {

        $user_id = (int) $req->cookie('user_id');

        $orders = DB::table('orders')->select('orders.id', 'product.name',
        'address.address_name', 'orders.total',
        'orders.status', 'order_details.amount')
        ->join('address', 'orders.address_id', '=', 'address.id')
        ->join('order_details', 'order_details.order_id', '=','orders.id')
        ->join('product', 'product.id', '=', 'order_details.product_id')
        ->where('orders.user_id', $user_id)
        ->orderByDesc('orders.id')
        ->get();

        return view('page.order_infor', [
            'orders' => $orders
        ]);
    }

    public function postCancel(Request $req) {

        $this->validate( $req,
        [
            'order_inducement' =>'required|alpha'
        ],
        [
            'order_inducement.required' => 'vui lòng nhập lý do',
            'order_inducement.alpha' => 'Vui lòng chỉ nhập chữ cái'
        ]);

        $order_id = (int) $req->order_id;
        $reason = $req->order_inducement;

        $order = Orders::find($order_id);

        $order->status = -1;
        $order->reason = $reason;

        $order->save();

        return redirect()->back()->with(['success'=>'success', 'message'=>'Huỷ thành công']);
    }

}
