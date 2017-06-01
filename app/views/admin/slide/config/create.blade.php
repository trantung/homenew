@extends('admin.layout.default')
    {{ $title='Thêm mới' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a class="btn btn-success back">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('SlideController@postConfig'))) }}
                <div class="box-body">
                    Cài đặt
                    @if ($typeConfig == TYPE_SLIDE_BLOCK)
                        <input type="hidden" name="model_name" value="block">
                    @else
                        <input type="hidden" name="model_name" value="menu">
                    @endif
                    <input type="hidden" name="model_id" value="{{ $modelId }}">
                    @if (isset($configTitle) && $configTitle == 'config-title')
                        <div class="form-group">
                            <label for="tentheloai">Tiêu đề</label>
                            <div class="row">
                                <div class="col-sm-6">
                                     {{ Form::text('title', null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="tentheloai">Thời gian</label>
                            <div class="row">
                                <div class="col-sm-6">
                                     {{ Form::text('time', null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                    @endif
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