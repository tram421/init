@extends('admin.main')
@section('content')
<form action = '' method = 'POST'>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Trang</label>
                    <input type="text" name = "name" value = "@if($data){{$data->name}}@endif" class="form-control" id="name" onblur="addSlug()">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" name = "slug" value = "@if($data){{$data->slug}}@endif" class="form-control" id="slug">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox" name="status" @if($data->status == 1) checked @endif >
                    <label for="">Công bố</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for=""> Nội dung: </label>
                    <textarea name="content" class="form-control" id="editor1">@if(isset($data)){{$data->content}}@endif</textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Vị trí</label>
            <input type="number" name="order_by" class="form-control" value="@if(isset($data)){{$data->order}}@endif">
        </div>

    </div>
    <!-- /.card-body -->
    @csrf
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Chỉnh sửa trang</button>
    </div>
</form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('editor1')
    </script>
    <script src="/js/admin.js"></script>
@endsection
