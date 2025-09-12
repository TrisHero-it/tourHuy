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
            <h5>Thêm logo</h5>
        </div>
        <div class="card-body">
            <form action="/admin/logos" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="image">Logo</label> <br>
                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                @error('image')
                <div style="color:red">{{$message}}</div>
                @enderror
                
                <!-- Image Preview -->
                <div id="imagePreview" style="margin-top: 15px; display: none;">
                    <label style="font-weight: bold; color: #333;">Xem trước logo:</label>
                    <div style="border: 2px dashed #007bff; padding: 20px; text-align: center; border-radius: 8px; background: #f8f9fa;">
                        <img id="previewImg" src="" alt="Preview" style="max-width: 300px; max-height: 200px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        <div style="margin-top: 10px; color: #666; font-size: 14px;">
                            <i class="fas fa-check-circle" style="color: #28a745; margin-right: 5px;"></i>
                            Logo đã được chọn
                        </div>
                    </div>
                </div>
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

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

// Reset preview when form is reset
document.querySelector('form').addEventListener('reset', function() {
    document.getElementById('imagePreview').style.display = 'none';
});
</script>
@endsection