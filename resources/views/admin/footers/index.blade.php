@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh sách thông tin footer</h5>
                <a href="/admin/footers/create" class="btn btn-primary">Thêm thông tin footer</a>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nội dung</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footers as $footer)
                            <tr>
                                <td>
                                    {!! $footer->content !!}
                                </td>
                                <td>
                                    <button onclick="deleteFooter({{ $footer->id }})" class="btn btn-outline-danger">Xóa</button>
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
    function deleteFooter(id) {
        if (confirm(`Ban muốn xóa bài này`)) {
            $.ajax({
                url: '/admin/footers/' + id,
                method: 'DELETE',
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                },
                success: function(data) {

                },

            });
        }
        setTimeout(notification1('Xóa thành công'), 1000);
        setTimeout(reload(), 1500);
    }

    function changeStatus(id, statusActive) {
        if (confirm(`Ban muốn bật/tắt bài này`)) {
            $.ajax({
                url: '/admin/footers/' + id,
                method: 'PUT',
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                    is_active: statusActive,
                },
                success: function(data) {},
            });
            reload()
        }
    }

    function reload() {
        window.location.reload();
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