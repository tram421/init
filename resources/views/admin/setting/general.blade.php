@extends('admin.main')

@section('head')

@endsection
@section('content')
    <form method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 con-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">Tên cửa hàng</label>
                        <input type="text" class="form-control" id="name" value="@if($data){{$data->name}}@endif" name="name">
                    </div>
                    <div class="form-group">
                        <label for="hotline">Hotline</label>
                        <input type="text" class="form-control" id="hotline" placeholder="Hotline" value="@if($data){{$data->hotline}}@endif" name="hotline">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea type="text" class="form-control" name="address">@if($data){{$data->address}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hotline">Điện thoại</label>
                        <input type="number" class="form-control" id="hotline" placeholder="tel" value="@if($data){{$data->phone}}@endif" name="phone">
                    </div>

                </div>
                <div class="col col-md-6 con-xs-12 col-lg-6">
                    <div class="form-group">
                        <label for="hotline">zalo</label>
                        <input type="number" class="form-control" id="hotline" placeholder="zalo" value="@if($data){{$data->zalo}}@endif" name="zalo">
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu ngắn</label>
                        <textarea type="text" class="form-control" id="short-about" name="short_description">@if($data){{$data->short_description}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hotline">Giờ làm việc</label>
                        <input type="text" class="form-control" id="hotline" placeholder="zalo" value="@if($data){{$data->open_at}}@endif" name="open_at">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col col-12">

                    <div class="form-group">
                        <label>Chính sách giao hàng</label>
                        <textarea type="text" class="form-control" id="editor1" name="ship_info">@if($data){{$data->ship_info}}@endif</textarea>
                    </div>
                </div>

            </div>


        </div>
        <!-- /.card-body -->
        @csrf
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection
@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
