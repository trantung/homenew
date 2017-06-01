<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />

    <meta name="author" content="hocmai" />

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta property="fb:app_id" content="600873143331099" />
    <meta property="fb:admins" content="619349115" />
    <meta property="og:description" content="Home" />
    <meta property="og:title" content="Home"/>
    <meta property="og:url" content="/"/>
    <meta property="og:image" content=""/>
    <meta property="og:type" content="article" />
        <style>
            :root {
                --gradient-start-9: rgba(3, 44, 130, 0.9);
                --gradient-end-8: rgba(0,114,188, 0.8);
            }
        </style>
    @section('block-var')
        <style>
            :root {
                --gradient-start: #03499a;
                --gradient-start-90: rgba(3,73,154, 0.9);
                --gradient-start-70: rgba(3,73,154, 0.7);
                --gradient-end: #0072bc;
                --gradient-end-75: rgba(0,114,188, 0.75);
                --gradient-end-90: rgba(0,114,188, 0.9);
                --main-color: #0089cf;
                --main-color-75: rgba(0,137,207, 0.75);
                --main-color-90: rgba(0,137,207, 0.90);
                --main-hover: #0072bc;
            }
        </style>
    @show
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css"/>
    <link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/fonts/montserrat.css"/>
    <link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/plugins/bootstrap-select/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
        <link rel="stylesheet" href="/plugins/slick/slick-theme.css"/>
        <link rel="stylesheet" href="/plugins/slick/slick.css"/>

    {{ HTML::style('frontend/css/style.css'.'?v='.$v) }}
    {{ HTML::style('frontend/css/style_responsive.css'.'?v='.$v) }}
</head>

<body class="@if($blockName != ""){{ "show_logo" }}@endif {{ getClass($blockName) }} @if($className != ""){{ $className }}@endif @if(isset($menuId)){{ "menuid" }}@endif">
<div id="head" class="main-gradient">
            <a class="logomobile" href="{{ action('Frontend\HomeController@index') }}" title="HOCMAI"><img src="{{ url('frontend/img/logo.png') }}" class="img-responsive" alt="HOCMAI"/></a>
            <div class="menu_mobile">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-5">

                    <div class="hotline">
                        1900 6933
                    </div>

                    <div class="logo-head">
                        <a href="{{ action('Frontend\HomeController@index') }}"><img src="{{ url('frontend/img/logo-white.png') }}"></a>
                    </div>

                
                <div class="search-content">
                    <form class="search-form">
                        <input class="search-input" type="text" name="keyword" value="" placeholder="Tìm kiếm ..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                        <input type="hidden" name="type" value="course">
                        <button class="search-submit main-color" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-7 clearfix">
                <div class="login pull-right">
                    <?php if ($block) { ?>
                    <div class="hotline hotline_mod">
                        1900 6933
                    </div>
                    <?php } ?>
                    <?php if ($user->id) { ?>
                        <div class="account">
                            <ul class="action-tool">
                                <li><a href="/course/mycourse.php" title="Khóa học của tôi" class="menu-icon book"><i class="fa fa-book" aria-hidden="true"></i></a></li>
                                <li><a href="/user/profile" title="Trang cá nhân" class="menu-icon people"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li><a class="menu-icon logout" href="/login/logout.php" title="Đăng xuất"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="#" class="signup-btn main-color hbtn">Đăng ký</a>
                        <a href="#" class="login-btn main-background-color hbtn">Đăng nhập</a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="main" class="clearfix">