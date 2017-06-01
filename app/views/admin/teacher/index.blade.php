@extends('admin.layout.default')
{{ $title='Quản lý giáo viên' }}
@stop

@section('content')
@include('admin.teacher.search')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách giáo viên</h3>
            </div>
            Tổng số giáo viên: {{ $data->getTotal() }}
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Giáo viên</th>
                        <th>Môn</th>
                        <th>Tiêu biểu</th>
                        <th>Thứ tự</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>
                            {{ $value->hoten }}
                        </td>
                        <td>{{ implode(',', TeacherSetup::getSubjectByTeacher($value->id)) }}</td>
                        <td>
                            @if ($value->active)
                                {{ Form::checkbox('hightlight', $value->hightlight, Common::checkValueChecked('TeacherSetup', ['hightlight' => $value->hightlight], 'hightlight'), array('class' => 'check-post', 'data-id' => $value->id, 'data-type' => 'hightlight')) }}
                            @else
                                Chưa có thông tin
                            @endif
                        </td>
                        <td>
                            {{ $value->weight_number }}
                        </td>
                        <td >
                            <a href="{{ action('DocumentController@getDocumentByTeacher', $value->id) }}" class="btn btn-primary">Tài liệu</a>
                            <a href="{{ action('TeacherSetupController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ url('admin/teacher-setup/weight-number', [DOUBLE_DOWN, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                            <a href="{{ url('admin/teacher-setup/weight-number', [DOUBLE_UP, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                            <a href="{{ url('admin/teacher-setup/weight-number', [UP, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <a href="{{ url('admin/teacher-setup/weight-number', [DOWN, $value->id]) }}" class="btn btn-primary"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
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
<script type="text/javascript">
     $(document).ready(function () {
        $('.check-post').on('change', function (e) {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            var isCheck = $(this).is(":checked");
            if (id) {
                postCheckHot(id, type, isCheck);
            }
        }); 
        
    })
    function postCheckHot(id, field, isCheck) {
        $.ajax({
            type: "POST",
            data: {field : field, checked : isCheck},
            url: '/manager/homenew/public/admin/teacher-setup/check-hot/' + id,
            success: function(response){
                alert(response.message);
                // if (response.status) {
                //     alert(response.message);
                // } else {
                    
                // }
            }
        });
    }    
</script>
@stop

