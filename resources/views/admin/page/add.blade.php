@extends('admin.main')

@section('content')

<form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col col-12 col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="">Tên Trang</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên" value = '' onblur="addSlug()">
                </div>
            </div>
            <div class="col col-12 col-lg-3 col-md-3">
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value = '' id="slug">
                </div>
            </div>
            <div class="col col-12 col-lg-3 col-md-3">
                <div class="form-group">
                    <label for="">Thứ tự</label>
                    <input type="number" name="order" class="form-control" value = '@if(isset($order)){{$order}}@endif'>
                </div>
            </div>

            <div class="form-group">
                <input type="checkbox" name="status" checked >
                <label for="">Công bố</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Nội dung</label>
            <textarea name="content" id="editor1"></textarea>
        </div>
    </div>
    @csrf
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm trang</button>
    </div>
</form>

@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="/js/admin.js"></script>
@endsection
