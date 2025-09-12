@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Danh sách bài logo</h5>
                <a href="/admin/logos/create" class="btn btn-primary">Thêm logo</a>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                                @if($logos->count() > 0)
                                @foreach ($logos as $logo)
                                <tr>
                                    <td>
                                        <img src="{{ asset($logo->image) }}" alt="Logo" style="width: auto; height: 200px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" 
                                             onerror="this.src='{{ asset('images/logo.png') }}'; this.alt='Logo not found';">
                                        <br><small style="color: #666;">{{ $logo->image }}</small>
                                    </td>
                                <td>
                                    @if ($logo->status == 'active')
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($logo->status == 'active')
                                    <a onclick="changeStatus({{ $logo->id }}, 'inactive')" class="btn btn-danger">Tắt</a>
                                    @else
                                    <a onclick="changeStatus({{ $logo->id }}, 'active')" class="btn btn-success">Bật</a>
                                    @endif

                                    <button onclick="deleteLogo({{ $logo->id }})" class="btn btn-outline-danger">Xóa</button>
                                </td>
                            </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" style="text-align: center; padding: 40px; color: #666;">
                                        <i class="fas fa-image" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
                                        <p>Chưa có logo nào. <a href="/admin/logos/create">Thêm logo đầu tiên</a></p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Zero config table end -->
</div>

<script !src="">
    function deleteLogo(id) {
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
        $.ajax({
            url: '/admin/logos',
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