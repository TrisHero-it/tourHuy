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
            <h5>Thêm tour du lịch</h5>
        </div>
        <div class="card-body">
            <form action="/admin/tours" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <label for="">Tên tour</label> <br>
                <input class="form-control" type="text" name="name">

                <label for="">Mô tả</label>
                <textarea name="description" id="editor" class="form-control"></textarea>

                <label for="">Giá</label>
                <input class="form-control" type="number" name="price">

                <label for="">Ảnh (chọn đúng 3 ảnh)</label>
                <input class="form-control" type="file" name="images[]" accept="image/*" multiple onchange="validateImages(this)">
                <small class="text-muted">Vui lòng chọn đúng 3 ảnh.</small>

                <label for="">Danh mục</label>
                <select class="form-control" name="category_id" onchange="changeCategory(this.value)">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div class="mb-3" id="categoryChild">

                </div>

                <label for="">Thời gian đi (nếu không có danh mục con)</label> <br>
                <input class="form-control" type="text" name="duration" placeholder="Ví dụ: 1 ngày, 2 ngày 1 đêm, 3 ngày 2 đêm, 4 ngày 3 đêm">

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
        if (input.files.length !== 3) {
            alert('Bạn phải chọn đúng 3 ảnh');
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