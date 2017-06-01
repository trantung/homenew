<tr>
    <td>{{ $slide->name }}</td>
    <td>{{ $slide->link_url }}</td>
    <td>{{ $slide->image_url }}</td>
    <td>{{ $slide->weight_number }}</td>
    <td>
        <a href="{{ action('SlideController@edit', $slide->id) }}" class="btn btn-primary">Sửa111</a>
        {{ Form::open(array('method'=>'DELETE', 'action' => array('SlideController@destroy', $slide->id), 'style' => 'display: inline-block;')) }}
        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
        {{ Form::close() }}
    </td>
</tr>