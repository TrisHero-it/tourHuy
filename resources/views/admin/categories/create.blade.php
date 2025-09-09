@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Thêm danh mục</h5>
        </div>
        <div class="card-body">
            <form action="/admin/footers" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Tên danh mục</label> <br>

                <input class="form-control" type="text" name="name">

                <label for="">Thumbnail</label> <br>
                <input class="form-control" type="file" name="image">
                @error('image')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="">Banner</label> <br>
                <input class="form-control" type="file" name="banner">

                <label for="">Description</label> <br>
                <textarea class="form-control" name="description" id="description"></textarea>
                @error('description')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="" class="mt-3">is_nav</label> <br>
                <input class="form-control" type="checkbox" name="is_nav">
                @error('is_nav')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="">is_featured</label> <br>
                <input class="form-control" type="checkbox" name="is_featured">
                @error('is_featured')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="">is_banner</label> <br>
                <input class="form-control" type="checkbox" name="is_banner">
                @error('is_banner')
                <div style="color:red">{{$message}}</div>
                @enderror

                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
            </form>
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