@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification"></div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Sửa danh mục</h5>
        </div>
        <div class="card-body">
            <form action="/admin/categories/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="">Tên danh mục</label> <br>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}">

                <label for="">Thumbnail hiện tại</label>
                <div class="mb-2">
                    <img src="{{ asset($category->image) }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <label for="">Đổi thumbnail</label> <br>
                <input class="form-control" type="file" name="image">

                <label for="">Banner hiện tại</label>
                <div class="mb-2">
                    @if($category->banner)
                    <img src="{{ asset($category->banner) }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                    <p class="text-muted">Chưa có banner</p>
                    @endif
                </div>
                <label for="">Đổi banner</label> <br>
                <input class="form-control" type="file" name="banner">

                <label for="">Description</label> <br>
                <textarea class="form-control" name="description" id="description">{{ $category->description }}</textarea>

                <label for="" class="mt-3">is_nav</label> <br>
                <input class="form-control" type="checkbox" name="is_nav" {{ $category->is_nav ? 'checked' : '' }}>

                <label for="">is_featured</label> <br>
                <input class="form-control" type="checkbox" name="is_featured" {{ $category->is_featured ? 'checked' : '' }}>

                <label for="">is_banner</label> <br>
                <input class="form-control" type="checkbox" name="is_banner" {{ $category->is_banner ? 'checked' : '' }}>

                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <a href="/admin/categories" class="btn btn-link" style="margin-top:10px">Quay lại danh sách</a>
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