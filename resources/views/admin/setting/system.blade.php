@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-12 my-2">
                <form>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input btn btn-danger">
                        <label class="w-25">Bảo trì hệ thống:</label>
                    </div>
                    <div>
                        <label class="w-25">Email dùng để gửi đến khách hàng:</label>
                        <input type="text">
                    </div>
                    <div>
                        <label class="w-25">Mật khẩu app:</label>
                        <input type="text">
                    </div>
                    @csrf
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
