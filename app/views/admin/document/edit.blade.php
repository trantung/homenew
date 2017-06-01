@extends('admin.layout.default')
    {{ $title='Sửa ' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a class="btn btn-success back">Trở về trang trước</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('DocumentController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên tài liệu</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('name', $data->name , textParentCategory('Tên tài liệu')) }}
                            </div>
                        </div>
                    </div>
                    @foreach ($data->teachers as $teacher)
                        {{ Form::hidden("teacher_id[]", $teacher , ['class' => 'field']) }}
                    @endforeach
                     
                   <div class="form-group">
                        <label for="rate">Mô tả </label>
                        <div class="row">
                            <div class="col-sm-12">
                                  <textarea class="form-control" rows="5" id="editor1" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGEDOCUMENT.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Tài liệu</label>
                        <div class="row">
                            <div class="col-sm-6">
                             <a href="{{ url(FILEDOCUMENT.$data->files) }}" >link tài liệu</a>
                             {{ Form::file('files', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Links</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('link_url', $data->link_url , textParentCategory('link')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('weight_number', $data->weight_number , textParentCategory('Mức ưu tiên')) }}
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
<script type="text/javascript">
    $(document).ready(function(){
        $('a.back').click(function(){
            parent.history.back();
            return false;
        });
    });
</script>
@stop