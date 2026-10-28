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
            <h5>Thêm thông tin Google Maps</h5>
        </div>
        <div class="card-body">
            <form action="/admin/google-maps" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Tên Google Maps</label> <br>
                <input class="form-control" type="text" name="name">
                @error('name')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="">Địa chỉ</label> <br>
                <input class="form-control" type="text" name="address">
                @error('address')
                <div style="color:red">{{$message}}</div>
                @enderror
                <label for="">Google Map URL</label> <br>
                <input class="form-control" type="text" name="map_url">
                @error('map_url')
                <div style="color:red">{{$message}}</div>
                @enderror
                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>

@endsection