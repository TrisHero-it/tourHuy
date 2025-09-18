@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
<style>
.alert {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-danger {
    background: linear-gradient(135deg, #ff6b6b, #ff5252);
    border: none;
    color: white;
}

.alert-danger i {
    margin-right: 8px;
}
</style>
@endsection
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Thêm danh mục con</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category-children.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục con</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục cha</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Chọn danh mục cha</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-2" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="hidden_money" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="hidden_money" name="hidden_money" value="1">
                    <label class="form-check-label" for="is_banner">Ẩn tiền (hidden_money)</label>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh danh mục con</label>
                    <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this)">
                    @error('image')
                    <div class="alert alert-danger mt-2" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                    </div>
                    @enderror
                    <div id="imagePreview" class="mt-2" style="display: none;">
                        <p class="text-muted">Ảnh xem trước:</p>
                        <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 4px; border: 1px solid #ddd;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{ route('admin.category-children.index') }}" class="btn btn-secondary">Hủy</a>
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

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Hiển thị popup toast notification
    function showToast(message, type = 'error') {
        const notification = document.getElementById('notification');
        const toast = document.createElement('div');
        toast.className = `alert alert-${type} alert-dismissible fade show`;
        toast.style.position = 'fixed';
        toast.style.top = '20px';
        toast.style.right = '20px';
        toast.style.zIndex = '9999';
        toast.style.minWidth = '300px';
        toast.innerHTML = `
            <i class="fas fa-exclamation-triangle"></i> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        notification.appendChild(toast);
        
        // Tự động ẩn sau 5 giây
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 5000);
    }

    // Kiểm tra lỗi validation và hiển thị popup
    const errors = @json($errors->all());
    if (errors.length > 0) {
        errors.forEach(error => {
            showToast(error, 'danger');
        });
    }
</script>
@endsection