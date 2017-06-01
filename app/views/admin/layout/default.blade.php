<!DOCTYPE html>
<html>
@include('admin.common.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.common.navbar')

  <!-- Left side column. contains the logo and sidebar -->
  <?php $checkBlock = checkPermissionBlock(); ?>
  @if ($checkBlock == SUPER_ADMIN)
    @include('admin.common.sidebar')
  @endif
  @if ($checkBlock == THPT_BLOCK)
    @include('admin.common.sidebar_thpt')
  @endif
  @if ($checkBlock == THCS_BLOCK)
    @include('admin.common.sidebar_thcs')
  @endif
  @if ($checkBlock == HOME_BLOCK)
    @include('admin.common.sidebar_home')
  @endif

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		  @yield('title')
        {{-- <small>Control panel</small> --}}
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
    	<!-- Notifications: message/alert/waring -->
    	@include('admin.common.message')
    	<!-- ./ notifications: message/alert/waring -->
		<!-- Content -->
    	@yield('content')
    	<!-- ./ content -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2015</strong>
  </footer>

</div>
<!-- ./wrapper -->

{{-- @include('admin.common.footer') --}}
</body>
</html>