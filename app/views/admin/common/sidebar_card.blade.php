<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li><a href="{{ action('CardController@index') }}"><i class="fa fa-dashboard"></i><span>Quản lý thẻ</span></a></li>

			@if(CardAdmin::isAdmin())
			<li><a href="{{ action('CardAdminController@index') }}"><i class="fa fa-dashboard"></i><span>Quản lý thành viên</span></a></li>
			@endif

			@if (isset($USER))
				@if(in_array($USER->username, ['tungtt2@hocmai.vn', 'hocmai.kithuat']))
					<li><a href="{{ action('LogAdminActionController@index') }}"><i class="fa fa-dashboard"></i> 
						<span>Quản lý log</span>
					</a></li>
				@endif
			@endif
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>