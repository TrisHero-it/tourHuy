@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<style>
    .alert {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
            <h5>Thêm nội dung footer</h5>
        </div>
        <div class="card-body">
            <form action="/admin/footers" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <label for="">Nội dung</label>
                <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                </div>
                @enderror

                <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>

<script>
    function changeCategory(id) {
        let categoryChild = document.getElementById('categoryChild');
        $.ajax({
            url: '/admin/category-childs-by-category/' + id,
            method: 'get',
            success: function(data) {
                let html = `<label
                        class="col-form-label col-lg-4 col-sm-12">Danh mục con</label>
                         <select class="form-control" name="category_child_id">
                        `;
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
        .then(editor => {
            console.log('CKEditor initialized successfully');
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
</script>

@endsection