<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Carts;
use App\Address;
use App\Orders;
use App\Order_Detail;
use App\Products;

class PayController extends Controller
{
    //
    public function getCheckout(Request $req){

        $price_all = 0;

        $user_id = $req->cookie('user_id');

        if (Auth::check() == true) {

            $carts = Carts::select('name', 'unit_price', 'carts.amount', 'carts.product_id')
            ->join('product', 'product.id', '=', 'carts.product_id')
            ->where([
                ['user_id', '=', $user_id]
            ])
            ->get();

            if (empty($carts[0])) {
                return redirect()->back()->with([
                'success'=>'danger',
                'message'=>'Bạn cần phải mua hàng'
                ]);
            }

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

        $user_id = (int)$req->cookie('user_id');

        $this->validate($req,
        [
            'full_name' => 'required',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required',
            'city'=>'required',
            'note'=>'required',
        ],
        [
            'full_name.required' => 'Vui lòng nhập tên',
            'phone.required'=> 'Vui lòng nhập phone',
            'address.required'=> 'Vui lòng nhập địa chỉ',
            'country.required'=> 'Vui lòng nhập đất nước',
            'city.required' => 'Vui lòng chọn thành phố',
            'note.required' => 'Vui lòng nhập ghi chú',

        ]);

        $address = Address::where('address_name', $req->address)->get();

        if (empty($address[0])) {
            $this->createAddress($req->address, $user_id);
        }

        $address = Address::select('id')->where('address_name', $req->address)->get();

        if ($req->note !== null)
            $this->createOrder((int)$req->total, $req->note, $user_id, $address[0]->id);
        else
            $this->createOrder((int)$req->total, "", $user_id, $address[0]->id);
        $order = Orders::select('id')
            ->where('user_id', $user_id)
            ->max('id');

        $this->createO_D($order, $user_id);

        $this->updateKho($user_id);

        Carts::where('user_id', $user_id)->delete();

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

    public function updateKho($user_id) {

        $carts = Carts::select('unit_price', 'carts.amount', 'carts.product_id', 'product.amount as p_amount')
            ->join('product', 'product.id', '=', 'carts.product_id')
            ->where([
                ['user_id', '=', $user_id]
            ])
            ->get();

            foreach ($carts as $cart) {
                Products::where('id', $cart->product_id)
                ->update(['amount'=>$cart->p_amount - $cart->amount]);
            }
    }
}
