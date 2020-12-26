<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product_Type;
use App\Accessories_PK;
use App\Products;
use App\Images;
use App\Order_Detail;
use App\PK_Product;



class ProductController extends Controller
{
    //
    public function getAddProduct() {
        $pro_types = Product_Type::all();
        $phu_kiens = Accessories_PK::all();

        return view('admin.add_product',
            [
                'pro_types' => $pro_types,
                'phu_kiens' => $phu_kiens,
            ]);
    }

    public function getEditProduct(Request $req) {
        $product_id = $req->input('product_id');
        $product = DB::table('product')
                    ->where('product.id', $product_id)
                    ->get();

        $pro_types = Product_Type::all();
        $phu_kiens = Accessories_PK::all();

        return view('admin.edit_product',[
            'product' => $product,
            'pro_types' => $pro_types,
            'phu_kiens' => $phu_kiens,
        ]);
    }

    public function postEditProduct(Request $req) {

        $this->updateProduct(
            $req->name_product,
            $req->description,
            $req->price,
            $req->value,
            $req->number,
            $req->pro_type_id,
            $req->product_id
        );

        $this->updateImage($req->image, $req->product_id);

        if (!empty($req->pk_product)) {
            $this->updatePK_Prod(
                $req->pk_product,
                $req->product_id
            );
        }

        return redirect()->route('list_product')->with(['success'=>'success', 'message'=>'Sửa thành công']);

    }

    public function getRemoveProduct(Request $req) {
        $product_id = $req->input('product_id');

        $product = Products::find($product_id);

        $product->delete();

        return redirect()->back()->with(['success'=>'success', 'message'=>'Xoá thành công']);
    }
    //

    public function postAddProduct(Request $req) {

        $this->validate( $req,
        [
            'name_product'=>'required',
            'number' => 'required|digits_between:1,100',
            'value' => 'required|digits_between:1,100',
            'price' => 'required|digits_between:1,100',
            'description'=> 'required',
        ],
        [
            'name_product.required'=>'Vui lòng nhập tên',
            'number.required'=>'Vui lòng chọn số lượng',
            'value.digits_between'=>'Vui lòng nhập giá trị gốc là số',
            'price.digits_between'=>'Vui lòng nhập giá trị bán là số',
            'number.digits_between'=>'Vui lòng nhập số lượng là số',
            'value.required'=>'Vui lòng nhập giá gốc',
            'price.required'=>'Vui lòng nhập giá bán',
            'description.required'=>'Vui lòng nhập mô tả',
        ]);

        $product_id = Products::where('name', $req->name_product)->get();

        if (empty($product_id[0])){
            $this->createProduct(
                $req->name_product,
                $req->description,
                $req->price,
                $req->value,
                $req->number,
                $req->pro_type_id
            );

            $product_id = Products::select('id')->where('name', $req->name_product)->get();

            $this->createImage($req->image, $product_id[0]->id);

            if (!empty($req->pk_product)) {
                $this->createPK_Prod(
                    $req->pk_product,
                    $product_id[0]->id
                );
            }

            return redirect()->back()->with(['success'=>'success', 'message'=>'Thêm thành công']);
        } else {
            $this->updateProduct(
                $req->name_product,
                $req->description,
                $req->price,
                $req->value,
                $req->number,
                $req->pro_type_id,
                $product_id->id
            );

            $this->updateImage($req->image, $product_id[0]->id);

            if (!empty($req->pk_product)) {
                $this->updatePK_Prod(
                    $req->pk_product,
                    $product_id[0]->id
                );
            }

            return redirect()->route('list_product');
        }
    }

    public function createProduct($name, $description, $price, $value, $amount, $pro_type_id) {
        $product = new Products();

        $product->name = $name;
        $product->description = $description;
        $product->unit_price = $price;
        $product->unit_value = $value;
        $product->amount = $amount;
        $product->product_type_id = $pro_type_id;

        $product->save();
    }

    public function createImage($url, $product_id) {
        $image = new Images();

        $image->url = $url;
        $image->product_id = $product_id;

        $image->save();
    }

    public function createPK_Prod($pks, $product_id) {
        $pk_prod = new PK_Product();

        foreach ($pks as $pk) {
            $pk_prod->product_id = $product_id;
            $pk_prod->accessories_id = $pk;

            $pk_prod->save();
        }
    }

    public function updateProduct($name, $description, $price, $value, $amount, $pro_type_id, $product_id) {
        $product = Products::find($product_id);

        $product->name = $name;
        $product->description = $description;
        $product->unit_price = $price;
        $product->unit_value = $value;
        $product->amount = $amount;
        $product->product_type_id = $pro_type_id;

        $product->save();
    }

    public function updateImage($url, $product_id) {
        Images::where('product_id', $product_id)->update(['url' => $url]);
    }

    public function updatePK_Prod($pks, $product_id) {
        $pk_prod = PK_Product::where('product_id', $product_id)->first();

        foreach ($pks as $pk) {
            $pk_prod->accessories_id = $pk;

            $pk_prod->save();
        }
    }

    public function getProduct(){
        $product_id = 1;
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

    public function getTrending(){
        $trend = Order_Detail::select('product_id')
                            ->groupBy('product_id')
                            ->limit(8)
                            ->orderBy(DB::raw('COUNT(product_id)'),'desc')
                            ->get();
            $product = array();
        foreach ($trend as $t){
            array_push($product,Products::select('name', 'unit_price', 'url', 'product.id')
                                ->join('image', 'image.product_id','=','product.id')
                                ->where('product.id', '=', $t)
                                ->get()
        );
        }
        return view('page.home',
        [
            'trending' => $product
        ]);
    }
    public function getAllProduct(){
        $product = Products::select('name', 'unit_price', 'url', 'product.id')
                            ->leftJoin('image', 'image.product_id','=','product.id')
                            ->get();
        return view('product.product',
        [
            'products' => $product
        ]);
    }
}
