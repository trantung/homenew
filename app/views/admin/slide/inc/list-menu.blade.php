<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $menu->name }} ( {{ (implode(', ', $menu->pupilClass->lists('name'))) }})</h3>
            <a href="{{ url('admin/slide/config-menu', $menu->id) }}"><i class="fa fa-cog" aria-hidden="true" ></i></a>
            Thời gian hiển thị 
            @if ($config = SlideConfig::where('model_name', 'menu')->where('model_id', $menu->id)->orderBy('id', 'DESC')->first())
                {{ $config->time; }}  phút 1 slide
            @endif
            <div class="box-tools">
                <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_MENU, $menu->id] ) }}" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên slide</th>
                        <th>Link</th>
                        <th>Ảnh</th>
                        <th>Thứ tự</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($typeSlide == TYPE_SLIDE_STUDENT)
                        @foreach ($menu->slides_student as $slide)
                            <tr>
                                <td>{{ $slide->name }}</td>
                                <td>{{ $slide->link_url }}</td>
                                <td>{{ $slide->image_url }}</td>
                                <td>{{ $slide->weight_number }}</td>
                                <td>
                                    <a href="{{ url('admin/slide/edit', [$slide->id, $typeSlide, TYPE_SLIDE_MENU, $menu->id]) }}"  class="btn btn-primary"> Sửa</a>
                                    {{ Form::open(array('method'=>'DELETE', 'action' => array('SlideController@destroy', $slide->id), 'style' => 'display: inline-block;')) }}
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                                    {{ Form::close() }}
                                    <a href="{{ url('admin/slide/weight-number', [DOUBLE_DOWN, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [DOUBLE_UP, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [UP, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [DOWN, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            {{-- @include('admin.slide.inc.body-table') --}}
                        @endforeach
                    @endif
                    @if ($typeSlide == TYPE_SLIDE_FULL)
                        @foreach ($menu->slides_full as $slide)
                            <tr>
                                <td>{{ $slide->name }}</td>
                                <td>{{ $slide->link_url }}</td>
                                <td>{{ $slide->image_url }}</td>
                                <td>{{ $slide->weight_number }}</td>
                                <td>
                                    <a href="{{ url('admin/slide/edit', [$slide->id, $typeSlide, TYPE_SLIDE_MENU, $menu->id]) }}"  class="btn btn-primary"> Sửa</a>
                                    {{ Form::open(array('method'=>'DELETE', 'action' => array('SlideController@destroy', $slide->id), 'style' => 'display: inline-block;')) }}
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                                    {{ Form::close() }}
                                    <a href="{{ url('admin/slide/weight-number', [DOUBLE_DOWN, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [DOUBLE_UP, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [UP, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <a href="{{ url('admin/slide/weight-number', [DOWN, $slide->id]) }}" class="btn btn-primary"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            {{-- @include('admin.slide.inc.body-table') --}}
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>