<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Carts;
use App\Products;
use App\Address;
use App\Orders;
use App\Order_Detail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
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

        if($cart == null){
            if($product_amount[0]->amount < $amount){
                return redirect()->back()->with([
                    'success'=>'danger',
                    'message'=>'Khong du hang']);
            }
            $cart = new Carts();
            $cart->product_id = $product_id;
            $cart->user_id = $user_id;
            $cart->amount = $amount;
            $cart->save();
            return redirect()->back()->with([
                'success'=>'success',
                'message'=>'Them thanh cong']);
        }else{
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

    public function removeProduct(Request $req){

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

        return view('page.cart',
        [
            'carts'=>$carts
        ]);
    }

    public function getCheckout(Request $req){

        $price_all = 0;

        $user_id = $req->cookie('user_id');

        if (Auth::check()) {

            $carts = Carts::select('name', 'unit_price', 'carts.amount', 'carts.product_id')
            ->join('product', 'product.id', '=', 'carts.product_id')
            ->where([
                ['user_id', '=', $user_id]
            ])
            ->get();

            // if (empty($carts[0])) {
            //     return redirect()->back()->with([
            //     'success'=>'danger',
            //     'message'=>'Bạn cần phải mua hàng'
            //     ]);
            // }

            $address = Address::select('address_name', 'full_name', 'phone')
            ->join('users', 'users.id', '=', 'address.user_id')
            ->where([
                ['user_id', $user_id],
                ['address.main', 1]
            ])
            ->get();

            foreach ($carts as $cart) {
                $price_all += $cart->unit_price * $cart->amount;
            }

            return view('page.checkout', [
                'address' => $address,
                'carts' => $carts,
                'price_all' => $price_all
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function postCheckout(Request $req) {

        $user_id = $req->cookie('user_id');

        $address = Address::where('address_name', $req->address);

        if (empty($address)) {
            $this->createAddress($req->address, $user_id);
        }

        $address = Address::select('id')->where('address_name', $req->address);

        $this->createOrder($req->total, $req->note, $user_id, $address[0]->id);
        $order = Orders::select('id')
            ->where('user_id', $user_id)
            ->max('id')
            ->get();

        $this->createO_D($order[0]->id, $user_id);

        return redirect()->route('home_1');

    }

    public function createAddress($in_address, $user_id) {
        $address = new Address();

        $address->address_name = $in_address;
        $address->user_id = $user_id;
        $address->main = 0;
        $address->save();
    }

    public function createOrder($total, $note, $user_id, $address_id) {
        $order = new Orders();

        $order->status = 0;
        $order->total = $total;
        $order->note = $note;
        $order->user_id = $user_id;
        $order->address_id = $address_id;

        $order->save();
    }

    public function createO_D($order_id, $user_id) {
        $carts = Carts::select('unit_price', 'carts.amount', 'carts.product_id')
            ->join('product', 'product.id', '=', 'carts.product_id')
            ->where([
                ['user_id', '=', $user_id]
            ])
            ->get();

        foreach ($carts as $cart) {
            $order_detail = new Order_Detail();

            $order_detail->product_id = $cart->product_id;
            $order_detail->amount = $cart->amount;
            $order_detail->unit_price = $cart->unit_price;
            $order_detail->order_id = $order_id;

            $order_detail->save();
        }
    }

}
