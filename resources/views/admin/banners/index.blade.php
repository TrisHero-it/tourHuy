@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh sách banner</h5>
                <a href="/admin/banners/create" class="btn btn-primary">Thêm banner</a>
            </div>
            <div id="thongbaoa"></div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Banner</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                            <tr>
                                <td><img src="{{asset($banner->image)}}" alt="" style="width: 500px; height: auto;"></td>
                                <td>@if ($banner->status == 'active')
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($banner->status == 'active')
                                    <a onclick="changeStatus({{ $banner->id }}, 'inactive')" class="btn btn-danger">Tắt</a>
                                    @else
                                    <a onclick="changeStatus({{ $banner->id }}, 'active')" class="btn btn-success">Bật</a>
                                    @endif

                                    <button onclick="deleteBanner({{ $banner->id }})" class="btn btn-outline-danger">Xóa</button>
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
                url: '/admin/banners/' + id,
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
                url: '/admin/banners/' + id,
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
        $.ajax({
            url: '/admin/banners',
            method: 'get',
            success: function(data) {
                console.log(data)
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newTable = htmlDoc.getElementById('table').innerHTML;
                document.getElementById('table').innerHTML = newTable;
            }
        })
    }
</script>

@endsection