@extends('admins::layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <h3 class="blank1">Danh sách người dùng</h3>
            <form>
                @if (Session::has('success'))
                    <div class="alert alert-{{ Session::get('success')}}">
                        {{(Session::get('message'))}}
                    </div>
                @endif
                <div class="xs tabls">
                    <div class="bs-example4" data-example-id="contextual-table">
                        <table class="table">
                            <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Email</th>
                                @if ((boolean)Cookie::get('main_admin') == true)
                                    <th>Sửa</th>
                                    <th>Xoá</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

                                @if(!empty($admins))
                                    @foreach($admins as $admin)
                                        <tr class="active">
                                            {{-- <th scope="row">1</th> --}}
                                            <td>{{($admin->email)}}</td>
                                            @if((boolean)Cookie::get('main_admin') == true)
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                                        {{($admin->is_main_admin? $data['main']: $data['non_main'])}}
                                                    <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        @if ($admin->is_main_admin)
                                                            <li class="active"><a href="{{(
                                                                route('edit_admin','admin='.$admin->id.'&quyen='.$admin->is_main_admin)
                                                                )}}">{{($data['main'])}}</a></li>
                                                            <li class=""><a href="{{(
                                                                route('edit_admin','admin='.$admin->id.'&quyen='.(!$admin->is_main_admin))
                                                                )}}">{{($data['non_main'])}}</a></li>
                                                        @else
                                                        <li class="active"><a href="{{(
                                                            route('edit_admin','admin='.$admin->id.'&quyen='.($admin->is_main_admin))
                                                            )}}">{{($data['non_main'])}}</a></li>
                                                        <li class=""><a href="{{(
                                                            route('edit_admin','admin='.$admin->id.'&quyen='.(!$admin->is_main_admin))
                                                            )}}">{{($data['main'])}}</a></li>
                                                        @endif
                                                    </ul>
                                                </div>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger">
                                                    <a href="{{(
                                                        route('remove_admin','admin='.$admin->person_id)
                                                        )}}" style="color: white;" >Xoá</a>
                                                </button>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        {{ $admins->links() }}
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </form>
        </div>
    </div>
@endsection
