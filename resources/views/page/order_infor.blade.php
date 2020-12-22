@extends('welcome')
@section('content')
<div class="banner-top">
	<div class="container">
		<h1>Order</h1>
		<em></em>
		<h2><a href="{{(URL::to('/home'))}}">Home</a><label>/</label>Order</h2>
	</div>
</div>

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('success'))
            <div class="alert alert-{{ Session::get('success') }}">
                {{( Session::get('message') )}}
            </div>
        @endif
    <table class="table table-hover">
        <thead>
            <tr>
            <th >Mã đơn</th>
            <th >Sản phẩm</th>
            <th >Địa chỉ</th>
            <th >Tổng tiền</th>
            <th >Trạng thái</th>
            <th >Lựa chọn</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($orders); $i++)
            <tr>
            <td>{{($orders[$i]->id)}}</td>
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
                <button type="button" class="btn btn-info btn-s" role="button" onclick="changeValue('od_{{($orders[$i]->id)}}')">Huỷ đơn </button>
                @endif
            </td>
            </tr>
            @endfor
        </tbody>
    </table>
    <div class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form class="form-inline" action="{{(route('cancel_order'))}}" method="post">
                @csrf
                <label for="popup">Vui lòng nhập lý do</label><br />
                <input type="text" id="popup" class="form-control" name="order_inducement" max="200" placeholder="Lý do"/>
                <input type="hidden" id="order_id" name="order_id" value=""/>
                <button type="submit" class="btn btn-primary" role="button">Huỷ đơn</button>
            </form>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
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
        console.log(order_id.value);
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
