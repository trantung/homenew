@if (checkPermissionBlock() == SUPER_ADMIN || checkPermissionBlock() == THCS_BLOCK)
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Quản lý ưu việt</h3> 
                <div class="box-tools">
                    <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_BLOCK, THCS_BLOCK]) }}" class="btn btn-primary">Thêm mới</a>
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
                        @foreach ($listBlock as $slide)
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Quản lý bước học</h3> 
                
                <div class="box-tools">
                    <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_MENU]) }}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                @foreach ($listMenu as $menu)
                    <?php
                        $blockCheck = MenuClass::getClassByMenu($menu->id);
                    ?>
                    @if (isset($blockCheck[checkPermissionBlock()]) 
                        || checkPermissionBlock() == SUPER_ADMIN 
                        || ($menu->block_id == THCS_BLOCK && checkPermissionBlock() == $menu->block_id)
                    )
                        @include('admin.slide.inc.list-menu-step')
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif

@if (checkPermissionBlock() == SUPER_ADMIN || checkPermissionBlock() == HOME_BLOCK)
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Quản lý báo chí</h3> 
                <div class="box-tools">
                    <a href="{{ url('admin/slide/create-slide',[$typeSlide, TYPE_SLIDE_BLOCK, SLIDE_HOME]) }}" class="btn btn-primary">Thêm mới</a>
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
                        @foreach ($listNews as $slide)
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
