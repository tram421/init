@extends('admin.main')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <form action="" method="POST">

        <div class="card-body">

            <div class="row">
                <div class="col col-12 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="">Tên Sản phẩm</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên"
                               value='@if(isset($data->name)){{$data->name}}@endif'
                               onblur="addSlug()">
                    </div>
                </div>
                <div class="col col-12 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control"
                               value='@if(isset($data->slug)){{$data->slug}}@endif' id="slug">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-12 col-md-6 col-lg-6 price">
                    <label>Giá Nhỏ nhất</label>
                    <input type="number" name="min_range" style="width: 100%" onkeyup="showPrice()"
                           class="priceInput"
                           value='@if(isset($data->min_range)){{$data->min_range}}@else{{0}}@endif'>
                    <span class="display_price"></span></Br>
                    <span class="display_price_text">(Bằng chữ: @if(isset($data->min_range)){{readNum($data->min_range)}}@endif)</span>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 price">
                    <label>Giá cao nhất</label>
                    <input type="number" name="max_range" style="width: 100%" onkeyup="showPrice()"
                           class="priceInput"
                           value='@if(isset($data->max_range)){{$data->max_range}}@else{{0}}@endif'>
                    <span class="display_price"></span></Br>
                    <span class="display_price_text">(Bằng chữ: @if(isset($data->max_range)){{readNum($data->max_range)}}@endif)</span>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 price">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="price" style="width: 100%" onkeyup="showPrice()" class="priceInput" value="@if(isset($data->price)){{$data->price}}@else{{0}}@endif">
                    <span class="display_price"></span></Br>
                    <span class="display_price_text">(Bằng chữ: @if(isset($readPrice)){{$readPrice}}@endif</span>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 price">
                    <label style="color:darkred">Giá giảm</label>
                    <input type="number" name="price_sale" style="width: 100%" onkeyup="showPrice()" class="priceInput" value="@if(isset($data->price_sale)){{$data->price_sale}}@else{{0}}@endif">
                    <span class="display_price"></span></Br>
                    <span class="display_price_text">(Bằng chữ: @if(isset($readPriceSale)){{$readPriceSale}}@endif)</span>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="">Image (kích thước: 300px : 221px):</label>
                    <input type="file" class="form-control" id="upload">
                    <div id="thumb" class='mt-3'>

                        <img class="m-2 mt-3" style="width : 200px"
                             src="@if(isset($data->image) && $data->image != 'no-image'){{$data->image}}@else /img/no-image-product.jpg @endif"
                             alt="top-image"
                        >

                    </div>
                    <input type="hidden" name="image" id="url_file"
                           value="@if(isset($data->image) && $data->image != 'no-image'){{$data->image}}@else/img/no-image-product.jpg @endif">
                </div>
            </div>
            <div class="row">
                <div class="col col-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_content" id=""
                                  style="width: 100%;height: 100px; padding:10px">@if(isset($data->short_content)){{$data->short_content}}@endif</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="description" id="description">@if(isset($data->description)){{$data->description}}@endif</textarea>
            </div>
            <div class="form-group">
                <label for="">Thông số kỹ thuật</label>
                <textarea name="specification" id="specification">@if(isset($data->specification)){{$data->specification}}@endif</textarea>
            </div>
            <div class="form-group">
                <input type="checkbox" name="active" <?php
                if (isset($data->active)) {
                    if ($data->active) echo 'checked';
                } else echo 'checked';
                ?> value="1">
                <label for="">Công bố</label>
            </div>
            <div class="form-group">
                <input type="checkbox" name="feature" <?php
                if (isset($data->active)) {
                    if ($data->active) echo 'checked';
                } else echo 'checked';
                ?> value="1">
                <label for="">Sản phẩm hot</label>
            </div>
            @csrf
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm trang</button>
        </div>
    </form>

@endsection
@section('footer')

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('specification');
    </script>
    <script src="/js/admin.js"></script>
@endsection

