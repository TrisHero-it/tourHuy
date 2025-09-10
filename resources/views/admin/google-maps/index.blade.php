@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh sách thông tin Google Maps</h5>
                <a href="/admin/google-maps/create" class="btn btn-primary">Thêm thông tin Google Maps</a>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Tên trang web</th>
                                <th>Địa chỉ</th>
                                <th>Google Map URL</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($googleMaps as $googleMap)
                            <tr>
                                <td>
                                    {{ $googleMap->name }}
                                </td>
                                <td>
                                    {{ $googleMap->address }}
                                </td>
                                <td>
                                    <div style="width: 100px; height: 100px; overflow: hidden;">
                                        {!! $googleMap->map_url !!}
                                    </div>
                                </td>
                                <td>
                                    @if ($googleMap->status == "active")
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($googleMap->status == "active")
                                    <a onclick="changeStatus({{ $googleMap->id }}, 'inactive')" class="btn btn-danger">Tắt</a>
                                    @else
                                    <a onclick="changeStatus({{ $googleMap->id }}, 'active')" class="btn btn-success">Bật</a>
                                    @endif

                                    <button onclick="deleteGoogleMap({{ $googleMap->id }})" class="btn btn-outline-danger">Xóa</button>
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
    function deleteGoogleMap(id) {
        if (confirm(`Ban muốn xóa bài này`)) {
            $.ajax({
                url: '/admin/google-maps/' + id,
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
        setTimeout(notification1('Xóa thành công'), 1000);
    }

    function changeStatus(id, statusActive) {
        if (confirm(`Ban muốn bật/tắt bài này`)) {
            $.ajax({
                url: '/admin/google-maps/' + id,
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
            url: '/admin/google-maps',
            method: 'get',
            success: function(data) {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newTable = htmlDoc.getElementById('table').innerHTML;
                document.getElementById('table').innerHTML = newTable;
            }
        })
    }

    function notification1(text) {
        let html = `
        <div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('images/design/favicon_io/favicon.ico')}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">Sinh travel</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                ${text}
            </div>
        </div> `
        $('#notification').prepend(html)
        setTimeout(() => {
            let a = document.getElementById('toast');
            a.style.transition = '0.2s ease all';
            a.style.transform = 'translateX(200%)';
            setTimeout(() => {
                document.getElementById('toast').remove()
            }, 1000)
        }, 2000)
    }
</script>
@endsection