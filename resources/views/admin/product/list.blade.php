<?php
//dd($data->currentPage());
?>
@extends('admin.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <div class="">
        <div class="col col-12">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-app float-right mt-2 mr-4" href="/admin/product/list/trash" style="height: inherit">
                            <span class="badge bg-danger">{{$countList}}</span>
                            <i class="far fa-trash-alt"></i>
                            <span>Trash</span>
                        </a>
                        <a class="btn btn-app mt-2 bg-success" href="/admin/product/list/desc">
                            <i class="fas fa-spa"></i> Mới nhất
                        </a>
                        <a class="btn btn-app mt-2" href="/admin/product/list/asc">
                            <i class="fas fa-sort-numeric-up"></i> Cũ nhất
                        </a>
                        <a class="btn btn-app mt-2 bg-info" href="/admin/product/list/all">
                            <i class="fas fa-th-list"></i> Tất cả
                        </a>
                    </div>
                </div>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th style="width: 10px">id</th>
                        <th>Tên</th>
                        <th>Giá gốc</th>
                        <th>Sale</th>
                        <th>Nổi bật</th>
                        <th style="width: 170px">Trạng Thái</th>
                        <th style="width: 170px">Xoá</th>
                        <th style="width: 200px">Cập Nhật</th>
                        <th style="width: 50px">Sửa</th>
                        <th style="width: 50px">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data))
                        @foreach ($data as $item)

                            <tr>

                                <td>{{$loop->index + 1 + ($data->perPage() * ($data->currentPage() - 1))}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->price_sale}}</td>
                                <td>
                                    @if($item->feature == 1)
                                        <a class="btn btn-success" href="/admin/product/update/feature/{{$item->id}}">Nổi bật</a>
                                    @else
                                        <a class="btn btn-light" href="/admin/product/update/feature/{{$item->id}}">Bình thường</a>
                                    @endif
                                </td>
                                <td>
                                    @if($item->active == 1)
                                        <a class="btn btn-success" href="/admin/product/update/active/{{$item->id}}">Có Hàng</a>
                                    @else
                                        <a class="btn btn-light" href="/admin/product/update/active/{{$item->id}}">Hết hàng</a>
                                    @endif
                                </td>
                                <td>
                                    @if($item->is_delete == 0)
                                        <a class="btn btn-success" href="/admin/product/update/is_delete/{{$item->id}}">Không</a>
                                    @else
                                        <a class="btn btn-light"
                                           href="/admin/product/update/is_delete/{{$item->id}}">Trash</a>
                                    @endif
                                </td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a class="btn btn-success" href="/admin/product/show/{{$item->id}}">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                       onclick="deleteRow({{$item->id}}, '/admin/product/delete/{{$item->id}}')">Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            {!! $data->links() !!}
        </div>
    </div>

@endsection
@section('footer')
    <script src="/js/admin.js"></script>
@endsection
