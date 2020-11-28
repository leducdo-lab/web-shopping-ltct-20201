@extends('index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <h3 class="blank1">Danh sách người dùng</h3>
            <form>
            <div class="xs tabls">
                <div class="bs-example4" data-example-id="contextual-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Admin</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="active">
                            <th scope="row">1</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr class="success">
                            <th scope="row">3</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr class="info">
                            <th scope="row">5</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr class="warning">
                            <th scope="row">7</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        <tr class="danger">
                            <th scope="row">9</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><input type="checkbox" name="Admin" value="Admin"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
{{--                <input type="submit" style="background:#31b0d5;--}}
{{--                                            color:white;--}}
{{--                                            font-size: 16px;--}}
{{--                                            width: 100px;--}}
{{--                                            height: 50px;--}}
{{--                                            position: absolute;--}}
{{--                                            left: 50%;--}}
{{--                                            margin-left: -50px;--}}
{{--                                            margin-top: 30px;"--}}
{{--                       value="Lưu">--}}
                <button type="submit" class="btn btn-primary" style="font-size:20px;width: 100px;margin-top: 30px; left: 50%; position: absolute;">Lưu</button>
            </form>
        </div>
    </div>
@endsection
