<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $menu->name }}</h3>
            <a href="{{ url('admin/slide/config-menu',[$menu->id, 'config-title'] ) }}"><i class="fa fa-cog" aria-hidden="true" ></i></a>
            {{ (implode(', ', $menu->pupilClass->lists('name'))) }}. Tiêu đề : 
            @if ($config = SlideConfig::whereNotNull('title')
            ->where('model_name', 'menu')
            ->where('model_id', $menu->id)
            ->orderBy('id', 'DESC')
            ->first())
                {{ $config->title; }}
            @endif
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
                    @foreach ($menu->slides_row as $slide)
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
                            </td>
                        </tr>
                        {{-- @include('admin.slide.inc.body-table') --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>