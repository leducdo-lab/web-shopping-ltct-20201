@extends('admins::layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    @if (Session::has('success'))
                        <div class="alert alert-{{ Session::get('success') }}">
                            {{( Session::get('message') )}}
                        </div>
                    @endif
                    @if (!empty($product[0]->id))
                        <h3 class="blank1">Sửa sản phẩm</h3>
                    @endif
                    <form action="{{(route('edit_product'))}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="product_id" value="{{($product[0]->id)}}">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="name_product" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input
                                    type="text"
                                    class="form-control1"
                                    name="name_product"
                                    id="name_product"
                                    placeholder="Tên sản phẩm"
                                    value="{{($product[0]->name ? $product[0]->name : "")}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="col-sm-2 control-label">Số lượng sản phẩm</label>
                            <div class="col-sm-8">
                                <input
                                    type="number"
                                    class="form-control1"
                                    name="number"
                                    id="number"
                                    placeholder="Số lượng sản phẩm"
                                    value="{{($product[0]->amount ? $product[0]->amount : "")}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-sm-2 control-label">Giá gốc</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control1"
                                    name="value" id="value"
                                    placeholder="Giá gốc" value="{{( $product[0]->unit_value ? $product[0]->unit_value : "")}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control1"
                                    name="price" id="price"
                                    value="{{($product[0]->unit_price ? $product[0]->unit_price : "")}}"
                                    placeholder="Giá bán"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8">
                                <textarea placeholder="Mô tả" id="description"
                                name="description" cols="50" rows="4"
                                class="form-control1"
                                >{{($product[0]->description ? $product[0]->description : "")}}
                            </textarea>
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
