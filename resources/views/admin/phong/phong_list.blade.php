@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phòng</h1>
        </div>
    </div>
    <div class="panel-body">
        <form method="GET" action="{{ route('admin.phong.getThem') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mớI</button>
        </form>
    </div>

    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('thongbao') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách phòng
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dtBasicExample">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID phòng</th>
                            <th>Tên phòng</th>
                            <th>Tên loại phòng</th>
                            <th>Tổng số phòng</th>
                            <th>Booked</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Chú thích</th>
                            <th>Hình ảnh</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($phong))
                            <?php $i = 1; ?>
                            @foreach ($phong as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><b style="color: red">{{ $item->id }}</b></td>
                                    <td>{{ $item->tenphong }}</td>

                                    @if (isset($item->loaiphong->tenloaiphong))
                                        <td>{{ $item->loaiphong->tenloaiphong }}</td>
                                    @else
                                        <td><i style="color: red">Không còn tồn tại</i></td>
                                    @endif

                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->booked }}</td>
                                    
                                    <td>{{ number_format($item->gia). " VNĐ" }}</td>
                                    @if ($item->soluong > 0)
                                        <td><i style="color: rgb(5, 146, 64)">Còn phòng</i></td>
                                    @else
                                        <td><i style="color: red">Hết phòng</i></td>
                                    @endif
                                    <td>{{ $item->chuthich }}</td>
                                    <td>
                                        @if ($item->hinhanh == '')
                                            <img width="200" height="100" src="{{ url('font-end/img/empty.jpg') }}" alt=""
                                                title="{{ $item->tenphong }}">

                                        @else
                                            <img width="200" height="100" src="{{ url('upload/phong/' . $item->hinhanh) }}"
                                                alt="" title="{{ $item->hinhanh }}">
                                        @endif
                                    </td>
                                    <th><a href="{{ route('admin.phong.getSua', ['id' => $item->id]) }}">Sửa</a> | <a
                                            href="{{ route('admin.phong.getXoa', ['id' => $item->id]) }}"
                                            onclick="return ConfirmDelete()">Xoá</a></th>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
