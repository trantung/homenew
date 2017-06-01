@extends('admin.layout.default')
{{ $title='Quản lý Config' }}
@stop

@section('content')
<div>Tổng số user {{ $total3 }}</div>
<div>Tổng số user được tặng thành công: {{ $total }}</div>
<div>Tổng số user tặng lỗi: {{ $total2 }}</div>
<div>Tổng số user không có tài khoản: {{ $total1 }}</div>

{{ Form::open(array('action' => array('AdminImportController@store'), 'files' => true)) }}
    <div class="form-group">
        <label for="name">Import</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::file('file', array('id' => 'file')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="name">Select khoa hoc</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::select('course_id', $data) }}
            </div>
        </div>
    </div>
    <div class="box-footer">
        {{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
    </div>
{{ Form::close() }}
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tr>
            <th>STT</th>
            <th>Username</th>
            <th>Lỗi</th>
        </tr>
        @foreach($userError as $key => $value)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value['username'] }}</td>
            <td>{{ $value['error'] }}</td>
        </tr>
        @endforeach
    </table>
</div>

@stop

