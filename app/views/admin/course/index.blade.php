@extends('admin.layout.default')
{{ $title='Quản lý' }}
@stop

@section('content')
<?php 
if (Session::has('group_id')) {
    $groupId = Session::get('group_id');
} else {
    $groupId = null;
}
?>
<div class="form-group">
    <label for="email">Chọn chương trình</label>
    <div class="row">
        <div class="col-sm-6">
            {{ Form::select('group_id',['' => 'Không chọn']+ PackageGroup::getGroupByBlock(checkPermissionBlock()), $groupId,  array('class' => 'form-control select-group'))}}
        </div>
    </div>
</div>
@if(checkPermissionBlock() == SUPER_ADMIN )
    @include('admin.course.search')
    <div>
        <div class="row">
            Tổng số khoá học: {{ $data->getTotal() }}
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Tên khóa học</th>
                                <th>hot</th>
                                <th>sale</th>
                                {{-- <th>new</th> --}}
                                <th>Mức hiển thị</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->fullname }}</td>
                                <td>{{ Form::checkbox('is_hot', 1, $value->is_hot, array('class' => 'check-post', 'data-id' => $value->id, 'data-type' => 'is_hot')) }}</td>
                                <td>{{ Form::checkbox('is_sale', 1, $value->is_sale, array('class' => 'check-post', 'data-id' => $value->id, 'data-type' => 'is_sale')) }}</td>
                                {{-- <td>{{ statusName($value->is_new) }}</td> --}}
                                <td>{{ $value->weight_number }}</td>
                                <td >
                                    <a href="{{ action('CourseManagerController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                                    @if ($value->weight_number)
                                        <a href="{{ url('admin/course/weight-number', [DOUBLE_DOWN, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                                        <a href="{{ url('admin/course/weight-number', [DOUBLE_UP, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                                        <a href="{{ url('admin/course/weight-number', [UP, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <a href="{{ url('admin/course/weight-number', [DOWN, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <ul class="pagination">
                    <!-- phan trang -->
                    {{ $data->appends(Request::except('page'))->links() }}
                </ul>
            </div>
        </div>
    </div>
@endif


<div id="content-course"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var groupId = $('.select-group').val();
        if (groupId > 0) {
            getListCourse($('.select-group').val());
        }
        
        $('.check-post').on('change', function (e) {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            var isCheck = $(this).is(":checked");
            if (id) {
                postCheckHot(id, type, isCheck);
            }
        }); 
        $('.select-group').on('change', function (e) {
            var id = $(this).val();
            if (id) {
                getListCourse(id);
            }
        }); 
    })
    function postCheckHot(id, field, isCheck) {
        $.ajax({
            type: "POST",
            data: {field : field, checked : isCheck},
            url: '/manager/homenew/public/admin/course/check-hot/' + id,
            success: function(response){
                alert(response.message);
                // if (response.status) {
                //     alert(response.message);
                // } else {
                    
                // }
            }
        });
    }    

    function getListCourse(id) {
        $.ajax({
            type: "GET",
            url: '/manager/homenew/public/admin/course/list/' + id,
            success: function(response){
                $("#course-render").remove();
                $('#content-course').append(response);
            }
        });
    }    
</script>
@stop

