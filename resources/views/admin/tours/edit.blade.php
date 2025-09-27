@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification"></div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Sửa tour du lịch</h5>
        </div>
        <div class="card-body">
            <form action="/admin/tours/{{ $tour->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="">Tên tour</label> <br>
                <input class="form-control" type="text" name="name" value="{{ old('name', $tour->name) }}">
                @error('name')
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                </div>
                @enderror

                <label for="">Mô tả</label>
                <textarea name="description" id="editor" class="form-control">{{ old('description', $tour->description) }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                </div>
                @enderror

                <label for="">Giá (USD)</label>
                <input class="form-control" type="text" name="price" value="{{ old('price', $tour->price_usd) }}">

                <label for="">Ảnh hiện tại</label>
                <div class="mb-2" style="display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach(($tour->image ?? []) as $img)
                    <img src="{{ asset($img) }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">
                    @endforeach
                </div>
                <label for="">Đổi ảnh (tùy chọn - nếu chọn thì phải chọn đúng 3 ảnh)</label>
                <input class="form-control" type="file" name="images[]" accept="image/*" multiple onchange="validateImages(this)">
                <small class="text-muted">Để giữ ảnh cũ, không cần chọn lại. Nếu chọn ảnh mới, vui lòng chọn đúng 3 ảnh.</small>
                @error('images')
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                </div>
                @enderror

                <label for="">Danh mục</label>
                <select class="form-control" name="category_id" onchange="changeCategory(this.value)">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $tour->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                </div>
                @enderror

                <div class="mb-3" id="categoryChild">
                    @if($tour->category_child_id)
                    <label class="col-form-label col-lg-4 col-sm-12">Danh mục con</label>
                    <select class="form-control" name="category_child_id">
                        @php($children = optional($categories->firstWhere('id', $tour->category_id))->categoryChild ?? collect())
                        @foreach($children as $child)
                        <option value="{{ $child->id }}" {{ $tour->category_child_id == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>

                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <a href="/admin/tours" class="btn btn-link" style="margin-top:10px">Quay lại danh sách</a>
</div>

<script>
    function changeCategory(id) {
        let categoryChild = document.getElementById('categoryChild');
        $.ajax({
            url: '/admin/category-childs-by-category/' + id,
            method: 'get',
            success: function(data) {
                let html = `<label class="col-form-label col-lg-4 col-sm-12">Danh mục con</label>
                         <select class="form-control" name="category_child_id">`;
                data.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`;
                });
                html += `</select>`;
                categoryChild.innerHTML = html;
            }
        })
    }

    function validateImages(input) {
        if (!input.files) return;
        if (input.files.length > 0 && input.files.length !== 3) {
            alert('Nếu chọn ảnh, bạn phải chọn đúng 3 ảnh');
            input.value = '';
        }
    }
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{route('upload-image', ['_token'=>csrf_token()])}}"
            }
        })
        .then(editor => {
            console.log('CKEditor initialized successfully');
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });

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