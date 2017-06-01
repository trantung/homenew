@extends('admin.layout.default')
    {{ $title='Thêm mới menu' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('MenuController@index') }}" class="btn btn-success">Danh sách menu</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('MenuController@store'))) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên menu</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('name', null , textParentCategory('Tên menu')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Chọn khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Chọn'] + Blocks::lists('name', 'id'), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chọn Lớp</label>
                        <div class="row">
                            @foreach(HomeClass::all() as $value)
                            <div class="col-sm-6">
                                {{ $value->name }}: {{ Form::checkbox("class[".$value->id."][class_id]", $value->id, null, ['data-id' => $value->id, 'class' => 'field check-class ' .getClassByClassId($value->id)]) }}
                                {{ Form::text("class[".$value->id."][weight_number]", null, array('id'=>"weight-class-" . $value->id, 'class' => 'check-option')) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="class">Chọn package group</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('package_group_id', ['' => 'Chọn'] + getAllPackageGroup('code'), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tentheloai">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link', null , textParentCategory('link')) }}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Lưu lại" />
                    <input type="reset" class="btn btn-default" value="Nhập lại" />
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </div>
    </div>
@include('admin.script.check-disabled')
<script type="text/javascript">
    $( ".check-class" ).change(function() {
        console.log("class");
        controlInput(this, 'class');
    }).change();
    $( "select[name=block_id]" ).change(function() {
        var block = $('select[name=block_id] option:selected').val();
        $('.check-class').prop('checked', false);
        $('.check-option').attr('disabled', true);
        if (block == 1) {
            $('.primary').attr('disabled', true);
            $('.secondary').attr('disabled', true);
            $('.before-tertiary').attr('disabled', false);
        }
        if (block == 2) {
            $('.primary').attr('disabled', true);
            $('.secondary').attr('disabled', false);
            $('.before-tertiary').attr('disabled', true);
        }
        if (block == 3) {
            $('.primary').attr('disabled', false);
            $('.secondary').attr('disabled', true);
            $('.before-tertiary').attr('disabled', true);
        }
    });
</script>
@stop