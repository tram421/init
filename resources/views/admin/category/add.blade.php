@extends('admin.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <form action="/admin/category/add" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col col-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Tên Danh Mục</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên" value = '' onblur="addSlug('/admin/category/slug')">
                    </div>
                </div>
                <div class="col col-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" value = '' id="slug">
                    </div>
                </div>
                <div class="col col-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Thứ tự</label>
                        <input type="number" name="order" class="form-control" value = '@if(isset($order)){{$order}}@endif'>
                    </div>
                </div>
            </div>
        </div>
        @csrf
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
        </div>
    </form>

@endsection
@section('footer')
    <script src="/js/admin.js"></script>
@endsection
