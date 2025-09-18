@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh sách bài orders</h5>
                <div class="d-flex align-items-center gap-2">
                    <form action="/admin/orders/export" class="d-flex align-items-center gap-2" style="height: 10px;" method="post">
                        @csrf
                        <select name="status" id="" onchange="window.location.href = '/admin/orders?status=' + this.value" class="form-control" style="width: 200px;">
                            <option value="">Tất cả</option>
                            <option {{ request()->status == 'Đã liên hệ' ? 'selected' : '' }} value="Đã liên hệ">Đã liên hệ</option>
                            <option {{ request()->status == 'Chưa liên hệ' ? 'selected' : '' }} value="Chưa liên hệ">Chưa liên hệ</option>
                            <option {{ request()->status == 'Thành công' ? 'selected' : '' }} value="Thành công">Thành công</option>
                            <option {{ request()->status == 'Thất bại' ? 'selected' : '' }} value="Thất bại">Thất bại</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Export</button>
                    </form>


                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tour</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->tour->name }}</td>
                                <td>{{ number_format($order->price_now, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    @if ($order->status == 'Chưa liên hệ')
                                    <a href="/admin/orders/{{ $order->id }}?status=Đã liên hệ" class="btn btn-primary">
                                        Đã liên hệ
                                    </a>
                                    @elseif ($order->status == 'Đã liên hệ')
                                    <a href="/admin/orders/{{ $order->id }}?status=Thành công" class="btn btn-success">
                                        Thành công
                                    </a>
                                    <a href="/admin/orders/{{ $order->id }}?status=Thất bại" class="btn btn-danger">
                                        Thất bại
                                    </a>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Zero config table end -->
</div>

<script !src="">
    function deleteBanner(id) {
        if (confirm(`Ban muốn xóa bài này`)) {
            $.ajax({
                url: '/admin/logos/' + id,
                method: 'DELETE',
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                },
                success: function(data) {

                },

            });
        }
        reload()
    }

    function changeStatus(id, statusActive) {
        if (confirm(`Ban muốn bật/tắt bài này`)) {
            $.ajax({
                url: '/admin/logos/' + id,
                method: 'PUT',
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                    status: statusActive,
                },
                success: function(data) {},
            });
            reload()
        }
    }

    function reload() {
        window.location.reload();
    }
</script>
@endsection