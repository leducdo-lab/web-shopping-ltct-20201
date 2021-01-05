@extends('admins::layout.index')
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
                            {{-- <th>STT</th> --}}
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                        </tr>
                        </thead>
                        <tbody>

                            @if(!empty($users))
                            @foreach ($users as $user)
                            <tr class="active">
                                {{-- <th scope="row"></th> --}}
                                <td>{{($user->full_name)}}</td>
                                <td>{{($user->email)}}</td>
                                <td>{{($user->phone)}}</td>
                                {{-- <td><input type="checkbox" name="Admin" value="Admin"></td> --}}
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
                <!-- /.table-responsive -->
            </div>
            </form>
        </div>
    </div>
@endsection
