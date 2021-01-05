@extends('admins::layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-{{ Session::get('success') }}">
                            {{( Session::get('message') )}}
                        </div>
                    @endif
                    <h3 class="blank1">Thêm sản phẩm</h3>
                    <form action="{{(route('add_product'))}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="name_product" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="name_product" id="name_product" placeholder="Tên sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="col-sm-2 control-label">Số lượng sản phẩm</label>
                            <div class="col-sm-8">
                                <input  type="number" class="form-control1" name="number" id="number" placeholder="Số lượng sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-sm-2 control-label">Giá gốc</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control1" name="value" id="value" placeholder="Giá gốc" step="10000" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control1" name="price" id="price" placeholder="Giá bán" step="10000" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8">
                                <textarea placeholder="Mô tả" id="description" name="description" cols="50" rows="4" class="form-control1"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Thể loại</label>
                            <div class="col-sm-8">
                                <select id="selector1" name="pro_type_id" class="form-control1">
                                    @if (!empty($pro_types))
                                        @foreach($pro_types as $pro_type)
                                            <option value="{{($pro_type->id)}}">{{($pro_type->name)}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phụ kiện kèm theo</label>
                            <div class="col-sm-8">
                                <select multiple="" name="pk_product[]" class="form-control1">
                                    @if (!empty($phu_kiens))
                                        @foreach($phu_kiens as $pk)
                                            <option value="{{( $pk->id )}}">{{($pk->name.'('.$pk->price.')')}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-sm-2 control-label">Ảnh</label>
                            <input type="file" name="image" id="exampleInputFile">
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button type="submit" class="btn-success btn">Submit</button>
                                    <button type="reset"class="btn btn-primary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
