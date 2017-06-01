<div id="course-render">
    
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
                                @if ($value->weight_number >= 0)
                                    <a href="{{ url('admin/course/weight-number', [DOUBLE_DOWN, $value->id, $groupId]) }}" class="btn btn-primary"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/course/weight-number', [DOUBLE_UP, $value->id, $groupId]) }}" class="btn btn-primary"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/course/weight-number', [DOWN, $value->id, $groupId]) }}" class="btn btn-primary"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/course/weight-number', [UP, $value->id, $groupId]) }}" class="btn btn-primary"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
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

    
</div>
