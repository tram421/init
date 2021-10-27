
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {!!Session::get('error')!!}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success
">
        {!!Session::get('success')!!}
    </div>
@endif

<?php
# Xoá lỗi mỗi khi nhấn link tải trang


Session::pull('error');
?>
