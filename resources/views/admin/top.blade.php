@extends('admin.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<form action = '/admin/top/update' method = 'POST'>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Image (kích thước: 1400px : 463px):</label>
                        <input type="file" class="form-control" id="upload">
                        <div id="thumb" class = 'mt-3'>

                            <img class = "m-2 mt-3" style = "width : 200px"
                                 src="@if(isset($data) && $data->image != 'no-image'){{$data->image}}@else /img/no-image-top.jpg @endif"
                                 alt="top-image"
                            >

                        </div>
                        <input type="hidden" name="image" id="url_file" value="@if(isset($data) && $data->image != 'no-image'){{$data->image}}@else/img/no-image-top.jpg @endif">
                    </div>
                </div>
            </div>
            <label for="">Content:</label>
            <div class="row">

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Main content</span>
                        </div>
                        <input type="text" class="form-control" name = "main_content"
                               placeholder="Main content" value="@if($data){{$data->main_content}} @endif">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mini content</span>
                        </div>
                        <input type="text" class="form-control" name = "mini_content"
                               placeholder="Mini content" value="@if($data){{$data->mini_content}} @endif">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col col-md-6 col-12">
                    <label for="">Button: </label>
                    <input type="text" name="content_button" value = "@if($data){{$data->content_button}} @endif" class="form-control" placeholder="nội dung button">
                </div>
                <div class="col col-md-6 col-12" style="display: flex;align-content: flex-end;">
                    <label for="">Url: </label>
                    <input type="text" name="url_button" value = "@if($data){{$data->url_button}} @endif" class="form-control" placeholder="Đường dẫn button" style="align-self: flex-end">
                </div>
            </div>
            @csrf

            <!-- /input-group -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

</form>

<div id="addSlideForm">

</div>
@endsection
@section('footer')
    <script src="/js/admin.js"></script>
@endsection
