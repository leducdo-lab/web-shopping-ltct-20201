@extends('admins::layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                @if (Session::has('success'))
                    <div class="alert alert-{{ Session::get('success') }}">
                        {{( Session::get('message') )}}
                    </div>
                @endif
                <h3 class="blank1">Danh sách sản phẩm</h3>
                <div class="xs tabls">
                    <div class="bs-example4" data-example-id="contextual-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($products))
                                @foreach ($products as $product)
                                <tr class="active">
                                    <td>{{($product->name)}}</td>
                                    <td>{{($product->amount)}}</td>
                                    <td>{{($product->unit_value)}}</td>
                                    <td>{{($product->unit_price)}}</td>
                                    <td><a href="{{(route('edit_product','product_id='.$product->id))}}">Sửa</a> |
                                        <a href="{{(route('remove_product','product_id='.$product->id))}}">Xóa</a>
                                    </td>
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
