@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách danh mục</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Thumbnail</th>
                                <th>Banner</th>
                                <th>Slug</th>
                                <th>Mô Tả</th>
                                <th>is_nav</th>
                                <th>is_featured</th>
                                <th>is_banner</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><img src="{{ asset($category->image) }}" alt=""
                                        style="width: 100px; height: 100px;"></td>
                                <td><img src="{{ asset($category->banner) }}" alt=""
                                        style="width: 100px; height: 100px;"></td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    @if ($category->is_nav == 1)
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->is_featured == 1)
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->is_banner == 1)
                                    <span class="badge rounded-pill text-bg-success"
                                        style="display: flex;align-items: center;width: max-content;">active</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-danger"
                                        style="display: flex;align-items: center;width: max-content;">inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-warning btn-sm">Sửa</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Xóa</button>
                                    </form>
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
    function changeStatus(id, status_id) {
        let flag = 'duyệt';
        let success = `
                                                                                                                           <span class="badge rounded-pill text-bg-success" style="display: flex;align-items: center;width: max-content;">Duyệt</span>
                                                                                                                           `
        let notification = document.getElementById('notification')
        if (status_id == 2) {
            flag = 'huỷ'
        }
        if (confirm(`Ban muốn ${flag} bài này`)) {
            $.ajax({
                url: '/admin-reports/' + id,
                method: 'PUT',
                data: {
                    _token: "{{csrf_token()}}",
                    id: id,
                    status_id: status_id,
                },
                success: function(data) {
                    console.log(data)
                    let html = '';
                    html += `<div class="toast toast-3 mb-2 fade show" id="toast${id}" role="alert" aria-live="assertive" aria-atomic="true">
                                                                                                                            <div class="toast-header">
                                                                                                                                <img src="{{'images/design/favicon_io/favicon.ico'}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                                                                                                                                <strong class="me-auto">CheckSca</strong>
                                                                                                                                <small class="text-muted">1 Giây</small>
                                                                                                                                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                                                                                                                                </button>
                                                                                                                            </div>
                                                                                                                            <div class="toast-body">
                                                                                                                                Trạng thái cập nhập thành công !!
                                                                                                                            </div>
                                                                                                                        </div>`
                    $('#notification').append(html)
                    reload()
                    setTimeout(() => {
                        let a = document.getElementById('toast' + id);
                        a.style.transition = '0.2s ease all';
                        a.style.transform = 'translateX(200%)';
                        setTimeout(() => {
                            document.getElementById('toast' + id).remove()
                        }, 300)
                    }, 2000)
                },
            });
        }
    }

    function reload() {
        $.ajax({
            url: '/admin-reports',
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