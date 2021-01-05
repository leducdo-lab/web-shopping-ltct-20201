<?php

namespace Phuong\Order\Http\Controller;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Phuong\Order\Models\Carts;
use Phuong\Order\Models\Orders;
use Phuong\Order\Models\Products;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    protected Carts $cart;
    protected Orders $order;
    protected Products $product;

    public function __construct(Carts $cart, Orders $order, Products $product)
    {
        $this->cart = $cart;
        $this->order = $order;
        $this->product = $product;
    }

    public function getCart(Request $req){
        $user_id = (int) $req->cookie('user_id');

        $carts = Carts::select('name', 'unit_price', 'carts.amount','url', 'carts.product_id')
                        ->join('product', 'product.id', '=', 'carts.product_id')
                        ->join('image', 'image.product_id', '=', 'product.id')
                        ->where([
                            ['user_id', '=', $user_id],
                            ['main', '=', '1'],
                        ])
                        ->get();

        return view('order::page.cart',
        [
            'carts'=>$carts
        ]);
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

        return view('order::page.order_infor', [
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

    public function postProducts(Request $req){

        $amount = (int)$req->amount;
        $product_id = (int)$req->product_id;


        $user_id = $req->cookie('user_id');
        $product_amount = Products::select('*')
                                ->where('id', '=', $product_id)
                                ->get();

        $cart = Carts::select('amount','id')
                        ->where([
                            ['user_id', '=', $user_id],
                            ['product_id', '=', $product_id],
                        ])
                        ->get();

        if(empty($cart[0])) {
            if($product_amount[0]->amount < $amount){
                return redirect()->back()->with([
                    'success'=>'danger',
                    'message'=>'Không đủ hàng']);
            }
            $cart = new Carts();
            $cart->product_id = $product_id;
            $cart->user_id = $user_id;
            $cart->amount = $amount;
            $cart->save();
            return redirect()->back()->with([
                'success'=>'success',
                'message'=>'Them thanh cong']);
        } else{
            if($product_amount[0]->amount < $amount + $cart[0]->amount){
                return redirect()->back()->with([
                    'success'=>'danger',
                    'message'=>'Khong du hang']);
            }
            Carts::where('id', $cart[0]->id)->update(['amount'=> $amount + $cart[0]->amount]);
            return redirect()->back()->with([
                'success'=>'success',
                'message'=>'Them thanh cong']);
        }
    }

    public function removeCart(Request $req){
        $user_id = (int) $req->cookie('user_id');
        $product_id = $req->input('product_id');

        Carts::where([
            ['user_id','=',$user_id],
            ['product_id','=',$product_id]])
            ->delete();
        return redirect()->back()->with(['success'=>'success', 'message'=>'Xoa thanh cong']);
    }


}
