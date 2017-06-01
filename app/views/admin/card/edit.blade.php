@extends('admin.layout.default_card')
    {{ $title='Sửa' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('CardController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('CardController@update', $data->id), 'method' => 'PUT')) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Mã thẻ</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('code', $data->code, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mật khẩu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::password('password', array('class'=>'form-control' ) ) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Nhập lại mật khẩu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::password('password_confirmation', array('class'=>'form-control' ) ) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Số ngày học thử</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('trial_day', $data->trial_day, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Giao cho</label>
                        <div class="row">
                            <div class="col-sm-6">                      
                               {{ Form::select('admin_id', CardAdmin::lists('username', 'id'), $data->admin_id,  array('class' => 'form-control'))}}
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
@stop