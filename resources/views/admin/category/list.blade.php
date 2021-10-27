@extends('admin.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <div class="">
        <div class="col col-12">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th style="width: 10px">id</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th style="width: 100px">Thứ tự</th>
                        <th style="width: 200px">Cập Nhật</th>
                        <th style="width: 50px">Sửa</th>
                        <th style="width: 50px">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data))
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->order}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a class="btn btn-success" href="/admin/category/show/{{$item->id}}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       onclick="deleteRow({{$item->id}}, '/admin/category/delete/{{$item->id}}')">Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
@section('footer')
    <script src="/js/admin.js"></script>
@endsection
