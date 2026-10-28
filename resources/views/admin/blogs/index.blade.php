@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Danh sách blogs</h5>
                <a href="/admin/blogs/create" class="btn btn-primary">Thêm blog</a>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Chủ đề</th>
                                <th>Thumbnail</th>
                                <th>Mô tả ngắn</th>
                                <th>Từ khoá</th>
                                <th>Slug</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $blog->title }}</td>
                                <td><img src="{{ asset($blog->image) }}" alt="" style="width: auto; height: 200px;"></td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $blog->meta }}</td>
                                <td>{{ $blog->key_words }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $blog->slug }}</td>
                                <td>
                                    <form onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài này không?')" action="/admin/blogs/{{ $blog->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($blogs->hasPages())
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-3">
                    <small class="text-muted">
                        Hiển thị {{ $blogs->firstItem() }}-{{ $blogs->lastItem() }} trong tổng số {{ $blogs->total() }} bài viết
                    </small>
                    {{ $blogs->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Zero config table end -->
</div>

@endsection