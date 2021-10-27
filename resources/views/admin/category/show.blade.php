@extends('admin.main')
@section('content')
    <form action='' method='POST'>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Trang</label>
                        <input type="text" name="name" value="@if($data){{$data->name}}@endif" class="form-control"
                               id="name" onblur="addSlug()">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug" value="@if($data){{$data->slug}}@endif" class="form-control"
                               id="slug">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Vị trí</label>
                <input type="number" name="order" class="form-control" value="<?php
                    if(isset($data)) {
                        if ($data->order != NULL) {
                            echo $data->order;
                        } else {
                            echo $order;
                        }
                    }
                ?>">
            </div>

        </div>
        <!-- /.card-body -->
        @csrf
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('editor1')
    </script>
    <script src="/js/admin.js"></script>
@endsection
