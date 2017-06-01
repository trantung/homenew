@extends('admin.layout.default_card')
{{ $title='Quản lý thẻ' }}
@stop

@section('content')
@if(CardAdmin::isAdmin())
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('CardController@create') }}" class="btn btn-primary">Thêm thẻ</a>
    </div>
</div>
@endif
@include('admin.card.search')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách thẻ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Mã thẻ</th>
                        <th>Kích hoạt</th>
                        <th>Free learn</th>
                         @if(CardAdmin::isAdmin())
                        <th>Giao cho ai</th>
                        @endif
                        <th>Ngày kích hoạt thẻ</th>
                         @if(CardAdmin::isAdmin())
                        <th>Action</th>
                        @endif
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->code }}</td>
                        @if($value->active == ACTIVE)
                        <td>Đã đăng nhập</td>
                        @else
                        <td>Chưa đăng nhập</td>
                        @endif
                        <td>{{ $value->trial_day }}</td>
                        <td>
                            @if(CardAdmin::isAdmin())
                                @if ($admin = CardAdmin::find($value->admin_id))
                                    {{$admin->username }}
                                @endif
                            @endif
                        </td>
                        <td>{{ $value->time_active }}</td>
                        <td>
                            @if(CardAdmin::isAdmin())
                                <a href="{{ action('CardController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                                {{ Form::open(array('method'=>'DELETE', 'action' => array('CardController@destroy', $value->id), 'style' => 'display: inline-block;')) }}

                                {{ Form::close() }}
                            @else
                                @if ($value->sell == ACTIVE)
                                    <button class="btn btn-primary" >Da ban
                                @else

                                {{ Form::open(array('method'=>'POST', 'action' => array('CardController@postSell', $value->id), 'style' => 'display: inline-block;')) }}
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn chuyen trang thai ban?');">Sell
                                @endif
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
<script type="text/javascript">
    //Date picker
    $( "#time_active" ).datepicker({ dateFormat: "dd-mm-yy" });
</script>
@stop

