<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Products;
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



}
