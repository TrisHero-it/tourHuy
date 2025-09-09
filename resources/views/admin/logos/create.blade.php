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
            <h5>Thêm tin tức</h5>
        </div>
        <div class="card-body">
            <form action="/admin/logos" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Logo</label> <br>
                <input class="form-control" type="file" name="image">
                @error('image')
                <div style="color:red">{{$message}}</div>
                @enderror
                @if (session('success'))
                <div class="alert alert-success mt-5" role="alert">
                    Thêm thành công
                </div>
                @endif
                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection