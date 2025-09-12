@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Danh sách danh mục con</h5>
            <a href="{{ route('admin.category-children.create') }}" class="btn btn-primary ">Thêm danh mục con</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên danh mục con</th>
                            <th>Danh mục cha</th>
                            <th>Slug</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoryChildren as $categoryChild)
                        <tr>
                            <td>{{ $categoryChild->name }}</td>
                            <td>{{ $categoryChild->category->name ?? 'N/A' }}</td>
                            <td>{{ $categoryChild->slug }}</td>
                            <td>
                                <a href="{{ route('admin.category-children.edit', $categoryChild->id) }}" class="btn btn-outline-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.category-children.destroy', $categoryChild->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục con này?')">
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

            {{ $categoryChildren->links() }}
        </div>
    </div>
</div>

@if (session('success'))
<script !src="">
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
                {{ session('success') }}
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
</script>
@endif
@endsection