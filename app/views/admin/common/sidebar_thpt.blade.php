<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Quản lý ảnh</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ action('SlideController@getList') }}"><i class="fa fa-circle-o"></i> Quản lý slide</a></li>
	          </ul>
	        </li>
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Quản lý tin tức</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ action('NewsController@getIndex') }}"><i class="fa fa-circle-o"></i> Quản lý tin</a></li>
	          </ul>
	        </li>
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Quản lý khóa học</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ action('MenuController@index') }}"><i class="fa fa-circle-o"></i> Quản lý menu</a></li>
	            <li><a href="{{ action('ProgramController@index') }}"><i class="fa fa-circle-o"></i> Quản lý chương trình</a></li>
	            <li><a href="{{ action('CourseManagerController@index') }}"><i class="fa fa-circle-o"></i> Danh sách khóa học</a></li>
	            <li><a href="{{ action('CourseTeacherController@index') }}"><i class="fa fa-circle-o"></i> Danh sách bài học thử</a></li>
	          </ul>
	        </li>
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Quản lý giáo viên</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ action('TeacherSetupController@index') }}"><i class="fa fa-circle-o"></i> Danh sách giáo viên</a></li>
	          </ul>
	        </li>
			<li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Quản lý chung</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ url('admin/slide/list',TYPE_SLIDE_STUDENT ) }}"><i class="fa fa-circle-o"></i> Nhân chứng</a></li>
	          </ul>
	        </li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>