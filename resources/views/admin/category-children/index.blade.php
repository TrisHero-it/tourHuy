@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Danh sách danh mục con</h5>
            <a href="{{ route('admin.category-children.create') }}" class="btn btn-primary ">Thêm danh mục con</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên danh mục con</th>
                            <th>Thumbnail</th>

                            <th>Danh mục cha</th>
                            <th>Slug</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoryChildren as $categoryChild)
                        <tr>
                            <td style="width: 60px; height: 66px; text-align: center; vertical-align: middle; padding: 8px;">
                                <div style="width: 50px; height: 50px; border-radius: 4px; border: 1px solid #dee2e6; margin: 0 auto; position: relative; overflow: hidden; flex-shrink: 0;">
                                    @if($categoryChild->image)
                                        <img src="{{ asset($categoryChild->image) }}" alt="{{ $categoryChild->name }}" style="width: 50px; height: 50px; object-fit: cover; position: absolute; top: 0; left: 0; display: block;">
                                    @else
                                        <div style="width: 50px; height: 50px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #6c757d; position: absolute; top: 0; left: 0;">
                                            <i class="fas fa-image" style="font-size: 16px;"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 200px; word-wrap: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $categoryChild->name }}">
                                    {{ $categoryChild->name }}
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 150px; word-wrap: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $categoryChild->category->name ?? 'N/A' }}">
                                    {{ $categoryChild->category->name ?? 'N/A' }}
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 150px; word-wrap: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $categoryChild->slug }}">
                                    {{ $categoryChild->slug }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.category-children.edit', $categoryChild->id) }}" class="btn btn-outline-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.category-children.destroy', $categoryChild->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục con này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($categoryChildren->hasPages())
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-3">
                <small class="text-muted">
                    Hiển thị {{ $categoryChildren->firstItem() }}-{{ $categoryChildren->lastItem() }} trong tổng số {{ $categoryChildren->total() }} danh mục con
                </small>
                {{ $categoryChildren->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection