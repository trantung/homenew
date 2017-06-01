<header class="main-header">
	<a href="#" class="logo">
		<span class="logo-mini">Quản lý trang chủ</span>
		<span class="logo-lg">Quản lý trang chủ</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		@if (Request::segment(1) == 'admin_card')
			<div class="navbar-custom-menu">
		      <ul class="nav navbar-nav">
		        <li class="user">
		          <a href="#"><i class="fa fa-user"></i>{{ Auth::member()->get()->username }}</a>
		        </li>

		        <li class="user">
		         <a href="{{ action('CardAdminController@edit', Auth::member()->get()->id) }}"><i class="fa fa-user"></i>Tài khoản</a>
		        </li>

		        <li class="user">
		         <a href="{{ action('CardAdminController@logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a>
		        </li>

		      </ul>
		    </div>
	    @else
	    	<div class="navbar-custom-menu">
		        <ul class="nav navbar-nav">
		          <!-- Notifications: style can be found in dropdown.less -->
		          <li class="dropdown notifications-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		              <i class="fa fa-bell-o"></i>
		              <span class="label label-warning">10</span>
		            </a>
		            <ul class="dropdown-menu">
		              <li class="header">You have 10 notifications</li>
		              <li>
		                <!-- inner menu: contains the actual data -->
		                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
		                  <li>
		                    <a href="#">
		                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
		                    </a>
		                  </li>
		                  <li>
		                    <a href="#">
		                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
		                      page and may cause design problems
		                    </a>
		                  </li>
		                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
		              </li>
		              <li class="footer"><a href="#">View all</a></li>
		            </ul>
		          </li>
		        </ul>
		      </div>
		@endif
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Menu</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="user">
				</li>
				<li class="user">
				</li>
			</ul>
		</div>
	</nav>
</header>