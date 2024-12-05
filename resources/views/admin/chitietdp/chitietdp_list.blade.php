@extends('admin.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đặt phòng</h1>
        </div>
    </div>

    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('thongbao') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đặt phòng
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dtBasicExample">
                    <thead>
                        <tr>
                            <th>Mã đặt phòng</th>
                            <th>Người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($datphong))
                            @foreach ($datphong as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    {{-- @if (isset($item->datphong->id))
                                        <td><b>{{ $item->datphong->id }}</b></td>
                                        @else
                                        <td><i style="color: red;"> --</i></td>
                                    @endif --}}
                                    <td>{{ $item->kh->ten_kh }}</td>
                                    <td>{{ $item->kh->sdt }}</td>
                                    <td>{{ $item->kh->email }}</td>
                                    <td>{{ $item->kh->diachi }}</td>
                                    <td>{{ $item->ngaydat }}</td>
                                    <td>{{ number_format($item->tongtien) }} VNĐ</td>

                                    <th><a href="{{ route('admin.chitietdp.getSua', ['id' => $item->id]) }}">Sửa</a>
                                        <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn-xem" data-toggle="modal" data-target="#myModal"
                                            id="btn-xem"
                                            data-url={{ route('admin.ajax.getDatPhong', ['id' => $item->id]) }}>Xem</button>
                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Chi tiết đặt phòng</h4>
                                                    </div>
                                                    <div class="modal-body" id="modal-content-detail">
                                                        {{-- content
                                                        --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $(document).ready(function() {
            $(".btn-xem").click(function(e) {
                var url = $(this).data('url');
                $.ajax({
                    type: 'get',
                    url: url,
                    dataType: 'html',
                    success: function(data) {
                        $('#modal-content-detail').html(data);
                    }
                })
            })
        })

    </script>
@endsection
