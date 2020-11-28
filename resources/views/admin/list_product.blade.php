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
                            <tr class="active">
                                <th scope="row">1</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr class="success">
                                <th scope="row">3</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr class="info">
                                <th scope="row">5</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr class="warning">
                                <th scope="row">7</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            <tr class="danger">
                                <th scope="row">9</th>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td>Column content</td>
                                <td><a href="{{(route('add_product'))}}">Sửa</a> | <a href="{{(route('list_product'))}}">Xóa</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection
