
@foreach ($listClass as $class)
    @if(checkPermissionBlock() == getBlockByClassId($class->id) || checkPermissionBlock() == SUPER_ADMIN )
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $class->name }}</h3> 
                <a href="{{ url('admin/slide/config-block', $class->id) }}"><i class="fa fa-cog" aria-hidden="true" ></i></a>
                Thời gian hiển thị 
                @if ($config = SlideConfig::whereNull('title')->where('model_name', 'class')->where('model_id', $class->id)->first())
                    {{ $config->time; }} phút 1 slide
                @endif
                <div class="box-tools">
                    <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_CLASS, $class->id]) }}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên slide</th>
                            <th>Link</th>
                            <th>Ảnh</th>
                            <th></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($typeSlide == TYPE_SLIDE_FULL) {
                                $data = $class->slides_full;
                            } else {
                                $data = $class->slides_student;
                            }
                        ?>
                            @foreach ($data as $slide)
                                <tr>
                                    <td>{{ $slide->name }}</td>
                                    <td>{{ $slide->link_url }}</td>
                                    <td>{{ $slide->image_url }}</td>
                                    <td>{{ $slide->weight_number }}</td>
                                    <td>
                                        <a href="{{ url('admin/slide/edit', [$slide->id, $typeSlide, TYPE_SLIDE_CLASS, $class->id]) }}"  class="btn btn-primary"> Sửa</a>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endforeach
@if (checkPermissionBlock() != THPT_BLOCK || checkPermissionBlock() == SUPER_ADMIN)
    @foreach ($listBlock as $block)
        @if(checkPermission($block->id))
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $block->name }}</h3> 
                    <a href="{{ url('admin/slide/config-block', $block->id) }}"><i class="fa fa-cog" aria-hidden="true" ></i></a>
                    Thời gian hiển thị 
                    @if ($config = SlideConfig::whereNull('title')->where('model_name', 'block')->where('model_id', $block->id)->first())
                        {{ $config->time; }} phút 1 slide
                    @endif
                    <div class="box-tools">
                        <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_BLOCK, $block->id]) }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên slide</th>
                                <th>Link</th>
                                <th>Ảnh</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($typeSlide == TYPE_SLIDE_STUDENT)
                                @foreach ($block->slides_student as $slide)
                                    <tr>
                                        <td>{{ $slide->name }}</td>
                                        <td>{{ $slide->link_url }}</td>
                                        <td>{{ $slide->image_url }}</td>
                                        <td>{{ $slide->weight_number }}</td>
                                        <td>
                                            <a href="{{ url('admin/slide/edit', [$slide->id, $typeSlide, TYPE_SLIDE_BLOCK, $slide->block_id]) }}"  class="btn btn-primary"> Sửa</a>
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
                                @foreach ($block->slides_full as $slide)
                                    <tr>
                                        <td>{{ $slide->name }}</td>
                                        <td>{{ $slide->link_url }}</td>
                                        <td>{{ $slide->image_url }}</td>
                                        <td>{{ $slide->weight_number }}</td>
                                        <td>
                                            <a href="{{ url('admin/slide/edit', [$slide->id, $typeSlide, TYPE_SLIDE_BLOCK, $slide->block_id]) }}"  class="btn btn-primary"> Sửa</a>
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
        @endif
    @endforeach
@endif
@foreach ($listMenu as $menu)
    <?php
            $arrClass = getListClassByBlock(checkPermissionBlock()); 
            $result = array_intersect($menu->pupilClass->lists('id'), $arrClass);
            $blockCheck = MenuClass::getClassByMenu($menu->id);
    ?>
    @if (isset($blockCheck[checkPermissionBlock()]) 
        || checkPermissionBlock() == SUPER_ADMIN 
        || ($menu->block_id == THCS_BLOCK && checkPermissionBlock() == $menu->block_id)
    )
        @if ($typeSlide == TYPE_SLIDE_STUDENT)
            @if (checkPermissionBlock() != THPT_BLOCK)
                @include('admin.slide.inc.list-menu')
            @endif
        @else
            @include('admin.slide.inc.list-menu')
        @endif
        
    @endif
@endforeach
