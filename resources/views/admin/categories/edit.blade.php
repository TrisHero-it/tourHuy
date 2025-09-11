@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Sửa danh mục: {{ $category->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="">Tên danh mục</label> <br>
                <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
                @error('name')
                <div style="color:red">{{$message}}</div>
                @enderror

                <label for="">Thumbnail hiện tại</label> <br>
                @if($category->image)
                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="max-width: 200px; max-height: 150px; margin-bottom: 10px;">
                @else
                <p>Chưa có ảnh thumbnail</p>
                @endif
                <br>
                <label for="image">Thay đổi thumbnail</label> <br>
                <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this, 'imagePreview', 'previewImg')">
                @error('image')
                <div style="color:red">{{$message}}</div>
                @enderror
                <div id="imagePreview" class="mt-2" style="display: none;">
                    <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 4px; border: 1px solid #ddd;">
                </div>

                <label for="">Banner hiện tại</label> <br>
                @if($category->banner)
                <img src="{{ asset($category->banner) }}" alt="{{ $category->name }} banner" style="max-width: 200px; max-height: 150px; margin-bottom: 10px;">
                @else
                <p>Chưa có ảnh banner</p>
                @endif
                <br>
                <label for="banner">Thay đổi banner</label> <br>
                <input class="form-control" type="file" name="banner" id="banner" onchange="previewImage(this, 'bannerPreview', 'previewBannerImg')">
                @error('banner')
                <div style="color:red">{{$message}}</div>
                @enderror
                <div id="bannerPreview" class="mt-2" style="display: none;">
                    <img id="previewBannerImg" src="" alt="Preview" style="max-width: 200px; max-height: 150px; border-radius: 4px; border: 1px solid #ddd;">
                </div>

                <label for="">Description</label> <br>
                <textarea class="form-control" name="description" id="editor">{{ old('description', $category->description) }}</textarea>
                @error('description')
                <div style="color:red">{{$message}}</div>
                @enderror

                <label for="">Mô tả ngắn</label> <br>
                <input class="form-control" type="text" name="meta" value="{{ old('meta', $category->meta) }}">

                <div class="form-check form-switch mt-3">
                    <input type="hidden" name="is_nav" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_nav" name="is_nav" value="1" {{ old('is_nav', $category->is_nav) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_nav">Hiển thị trên navigation (is_nav)</label>
                </div>
                @error('is_nav')
                <div style="color:red">{{$message}}</div>
                @enderror

                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $category->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Nổi bật (is_featured)</label>
                </div>
                @error('is_featured')
                <div style="color:red">{{$message}}</div>
                @enderror

                <div class="form-check form-switch mt-2">
                    <input type="hidden" name="is_banner" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_banner" name="is_banner" value="1" {{ old('is_banner', $category->is_banner) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_banner">Hiển thị banner (is_banner)</label>
                </div>
                @error('is_banner')
                <div style="color:red">{{$message}}</div>
                @enderror

                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.categories.index') }}" style="margin-top: 11px;" class="btn btn-secondary">Hủy</a>
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
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{route('upload-image', ['_token'=>csrf_token()])}}"
            }
        })
        .then(editor => {})
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#metaEditor'), {
            ckfinder: {
                uploadUrl: "{{route('upload-image', ['_token'=>csrf_token()])}}"
            }
        })
        .then(editor => {})
        .catch(error => {
            console.error(error);
        });

    function previewImage(input, containerId, imgId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(imgId).src = e.target.result;
                document.getElementById(containerId).style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection