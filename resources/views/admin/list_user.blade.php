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
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Admin</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('users'))
                                @foreach ($users as $user)
                                <tr class="active">
                                    <th scope="row">{{($user->index())}}</th>
                                    <td>{{($user->full_name)}}</td>
                                    <td>{{($user->email)}}</td>
                                    <td>{{($user->phone)}}</td>
                                    <td><input type="checkbox" name="Admin" value="Admin"></td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    {{ $users->links() }}
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
