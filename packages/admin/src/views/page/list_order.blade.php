@extends('admins::layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                @if (Session::has('success'))
                    <div class="alert alert-{{ Session::get('success') }}">
                        {{( Session::get('message') )}}
                    </div>
                @endif
                <h3 class="blank1">Danh sách đơn hàng</h3>
                <div class="xs tabls">
                    <div class="bs-example4" data-example-id="contextual-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th >Mã đơn</th>
                                <th >Người nhận</th>
                                <th >SĐT</th>
                                <th >Sản phẩm</th>
                                <th >Địa chỉ</th>
                                <th >Tổng tiền</th>
                                <th >Ghi chú</th>
                                <th >Trạng thái</th>
                                <th >Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($orders); $i++)
                                <tr>
                                <td>{{($orders[$i]->id)}}</td>
                                <td>{{($orders[$i]->full_name)}}</td>
                                <td>{{($orders[$i]->phone)}}</td>
                                <td>
                                    <button class="btn btn-info" role="button" onclick="show_hide('ul-{{($orders[$i]->id)}}')">Chi tiết</button>
                                    <ul class="list-group" id="ul-{{($orders[$i]->id)}}" style="display: none;">
                                        @for ($j = $i; $j < count($orders); $j++)
                                            @if ($orders[$j]->id == $orders[$i]->id)
                                                @php
                                                    {{$i = $j;}}
                                                @endphp
                                                <li class="list-group-item">{{($orders[$j]->name)}}<span class="badge">{{($orders[$j]->amount)}}</span></li>
                                            @endif
                                        @endfor
                                    </ul>
                                </td>
                                <td>{{($orders[$i]->address_name)}}</td>
                                <td>{{($orders[$i]->total)}}</td>
                                <td>{{($orders[$i]->note)}}</td>
                                <td>
                                    @if ($orders[$i]->status == 0)
                                        Đang xử lý
                                    @elseif ($orders[$i]->status == 1)
                                        Đang giao
                                    @elseif ($orders[$i]->status == 2)
                                        Hoàn thành
                                    @else
                                        Huỷ đơn
                                    @endif
                                </td>
                                <td>
                                    @if ($orders[$i]->status !== -1)
                                    <input type="hidden" id="od_{{($orders[$i]->id)}}" value="{{($orders[$i]->id)}}" />
                                    <button type="button" class="btn btn-info btn-s" role="button" onclick="changeValue('od_{{($orders[$i]->id)}}')">Sửa</button>
                                    @endif
                                </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <form class="form-inline" action="{{(route('list_order'))}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sel1">Chọn trạng thái:</label>
                                        <select class="form-control" id="sel1" name="status">
                                            <option selected>Chọn trạng thái</option>
                                            <option value="0">Đang xử lý</option>
                                            <option value="1">Đang giao</option>
                                            <option value="2">Hoàn thành</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="order_id" name="order_id" value=""/>
                                    <button type="submit" class="btn btn-primary" role="button">Sửa</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
        <script type="text/javascript" >
            show_hide = (id) => {
                let x = document.getElementById(id);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            changeValue = (id) => {
                let value = document.getElementById(id).value;
                let order_id = document.getElementById('order_id');
                order_id.value = value;
            }

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                var modal = $('.modal');
                var btn = $('.btn-s');
                var span = $('.close');

                btn.click(function () {
                    modal.show();
                });

                span.click(function () {
                    modal.hide();
                });

                $(window).on('click', function (e) {
                    if ($(e.target).is('.modal')) {
                    modal.hide();
                    }
                });
            });

        </script>
@endsection
