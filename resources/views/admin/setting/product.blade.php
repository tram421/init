@extends('admin.main')

@section('content')
    <form>
        <div class="card-body">
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                <label class="form-check-label" for="flexSwitchCheckDefault">Hiện khoản giá</label>
            </div>
            <div class="sale-all mb-4">
                <label>Giảm giá đồng loạt:</label>
                <input type="number">
                <span>%</span>
            </div>
            <div class="sale-select mb-4">
                <lable>Giảm giá theo danh mục: </lable>
                <select>
                    <option value="1">Tivi</option>
                    <option value="2">Samsung</option>
                </select>
                <input type="number">
                <span>%</span>
            </div>
            <div class="image-product mb-4">
                <lable>Số lượng hình ảnh sản phẩm:</lable>
                <input type="number">
            </div>
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                <label class="form-check-label" for="flexSwitchCheckDefault">Xoá luôn ảnh khi xoá sản phẩm</label>
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
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
