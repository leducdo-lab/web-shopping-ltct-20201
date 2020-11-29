@extends('index')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                <h3 class="blank1">Danh sách sản phẩm</h3>
                <div class="xs tabls">
                    <div class="bs-example4" data-example-id="contextual-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('products'))
                                @foreach ($products as $product)
                                <tr class="active">
                                    <th scope="row">{{($product->id)}}</th>
                                    <td>{{($product->name)}}</td>
                                    <td>{{($product->amount)}}</td>
                                    <td>{{($product->unit_value)}}</td>
                                    <td>{{($product->unit_price)}}</td>
                                    <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection
