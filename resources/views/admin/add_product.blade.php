@extends('index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <h3 class="blank1">Thêm sản phẩm</h3>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <form class="form-horizontal">
                        <div class="form-group">
{{--                            <div class="col-sm-2 jlkdfj1">--}}
{{--                                <p class="help-block">Your help text!</p>--}}
{{--                            </div>--}}
                        </div>
                        <div class="form-group">
                            <label for="nameproduct" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nameproduct" placeholder="Tên sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="col-sm-2 control-label">Số lượng sản phẩm</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control1" id="number" placeholder="Số lượng sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-sm-2 control-label">Giá gốc</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="value" placeholder="Giá gốc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="price" placeholder="Giá bán">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Thể loại</label>
                            <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                                    <option>Lorem ipsum dolor sit amet.</option>
                                    <option>Dolore, ab unde modi est!</option>
                                    <option>Illum, fuga minus sit eaque.</option>
                                    <option>Consequatur ducimus maiores voluptatum minima.</option>
                                </select></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phụ kiện kèm theo</label>
                            <div class="col-sm-8">
                                <select multiple="" class="form-control1">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-sm-2 control-label">Ảnh</label>
                            <input type="file" id="exampleInputFile">
                        </div>
                    </form>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button class="btn-success btn">Submit</button>
                                <button class="btn-default btn">Cancel</button>
                                <button class="btn-inverse btn">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
