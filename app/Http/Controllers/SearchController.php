<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Accessories_PK;
use App\Products;
use App\Images;


class SearchController extends Controller
{
    //
    public function getProduct(Request $req){
        $product_id = $req->input('product_id');
        $product = Products::find($product_id);
        $image = Images::select('id', 'url')
                ->where('product_id', $product_id)
                ->get();
        $accessories = Accessories_PK::select('name', 'price')
                                ->join('product_accesso', 'accessories.id', '=','product_accesso.accessories_id' )
                                ->where('product_id', $product_id)
                                ->get();
        return view('product.single',
        [
            'product' => $product,
            'images' => $image,
            'accessories' => $accessories
        ]);
    }

    public function getAllProduct(){
        $product = Products::select('name', 'unit_price', 'url', 'product.id')
                                ->leftJoin('image', 'image.product_id','=','product.id')
                                ->where('main', '=', '1')
                                ->get();

        return view('product.product',
        [
            'products' => $product
        ]);
    }

    public function postSearch(Request $req){
        $name = $req->input('name');
        $product = Products::select('name', 'unit_price', 'url', 'product.id')
                            ->leftJoin('image', 'image.product_id','=','product.id')
                            ->where([
                                ['main', '=', '1'],
                                ['name', 'like', '%'.$name.'%'],
                                ])
                            ->get();
        return view('product.product',
        [
            'products' => $product
        ]);
    }
    public function getProductsType(Request $req){
        $type = $req->input('type');
        $product = Products::select('name', 'unit_price', 'url', 'product.id')
                                ->leftJoin('image', 'image.product_id','=','product.id')
                                ->where([
                                    ['main', '=', '1'],
                                    ['product_type_id', '=', $type],
                                ])
                                ->get();

        return view('product.product',
        [
            'products' => $product
        ]);
    }
    public function getProductsCost(Request $req){
        $discount = $req->input('cost');
        if($discount == '1'){
            $cost1 = 0;
            $cost2 = 100000;
        }else if($discount == '2'){
            $cost1 = 100000;
            $cost2 = 300000;
        }else if($discount == '3'){
            $cost1 = 300000;
            $cost2 = 500000;
        }else if($discount == '4'){
            $cost1 = 500000;
            $cost2 = 1000000;
        }else if($discount == '5'){
            $cost1 = 1000000;
            $cost2 = 1000000000;
        }
        $product = Products::select('name', 'unit_price', 'url', 'product.id')
                                ->leftJoin('image', 'image.product_id','=','product.id')
                                ->where([
                                    ['main', '=', '1'],
                                    ['unit_price', '>', $cost1],
                                    ['unit_price', '<', $cost2],
                                ])
                                ->get();

        return view('product.product',
        [
            'products' => $product
        ]);
    }
}
