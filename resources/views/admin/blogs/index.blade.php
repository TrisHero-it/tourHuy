@extends('admin.layout.app')
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">
</div>
<div class="row" id="table">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách blogs</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Zero config table end -->
</div>
@endsection