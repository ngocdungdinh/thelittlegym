<!DOCTYPE html>
<html class="no-js">
<head>
    <title>
        @section('title')
            {{ Config::get('settings.sitename') }}
        @show
    </title>
    <meta charset="utf-8">
    <meta name="format-detection">
    <!--<link rel="stylesheet" href="css/bootstrap.css">	 -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--<link rel="stylesheet" href="css/bootstrap-theme.css">	 	 -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-theme.min.css') }}">

    <script src="{{ asset('assets/js/jquery.1.10.2.min.js') }}"></script>
    <!--<script src="js/bootstrap.js"></script>	 -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-hover-dropdown.js') }}"></script>

    <!--slide-->
    <meta name="viewport" content="width=device-width">

    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="{{ asset('assets/js/jquery.slides.min.js') }}"></script>
    <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/example.css') }}">
    <!--main res menu -->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/component.css') }}">

    <script type="text/javascript" src="{{ asset('assets/js/modernizr.custom.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/vptstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!--icon turn around-->
    <link rel="stylesheet" href="{{ asset('assets/css/style-turn-around.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/prefixfree.min.js') }}"></script>
    <!--carousel-->
    <link rel="stylesheet" href="{{ asset('assets/css/blockCarousel.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/blockCarousel.js') }}"></script>
    <!--zoom view---->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' type='text/css' href='{{ asset('assets/css/jquery.easy-gallery.css') }}' />
    <style>
        *{ margin: 0; padding: 0; }
        #wrap{
            /*margin: 30px auto;
            width: 1000px;*/
            overflow:hidden;
        }
        .float_left{ float:left; margin:5px; }
    </style>
    <!---->
    <!--view anh-->
    <script type='text/javascript' src='{{ asset('assets/js/jquery.easy-gallery.js') }}' ></script>

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">

</head>

<body>

<header>
    <div class="container">
        <div class="row logo">
            <img src="{{ asset('assets/img/logo.png') }}" class="img-responsive"/>
            {{--<span class="lang"><img style="margin-right:5px" src="{{ asset('assets/img/vn.png') }}"/><img src="{{ asset('assets/img/en.png') }}"/></span>--}}
        </div>
    </div>
</header>

<!---<div class=" row nav bg_menu menu" id="menu"> 	-->

<div class="clearfix row  menu " >
    <div class="container nav" id="menu">
        <ul class="navbar-nav">
            <li ><div class="menuline"><img src="{{ asset('assets/img/line_menu.png') }}"/></div></li>
            <li class="col-md-2 menu-item"><a href="{{ route('home') }}" class="linebr">Trang chủ</a></li>
            <li ><div class="menuline"><img src="{{ asset('assets/img/line_menu.png') }}"/></div></li>
            @foreach($categories as $menu)
                @if($menu->parent_id == 0)
                    <li class="col-md-2 menu-item"><a href="{{ route('view-category', $menu->slug) }}" class="linebr">{{ $menu->name }}</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $submenu)
                                @if($submenu->parent_id == $menu->id)
                                    <li>
                                        <div class="aresize"><a href="{{ route('view-category', $submenu->slug) }}">{{ $submenu->name }}</a></div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <li ><div class="menuline"><img src="{{ asset('assets/img/line_menu.png') }}"/></div></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

<!--menu-->
<script>
    //  The function to change the class
    var changeClass = function (r,className1,className2) {
        var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
        if( regex.test(r.className) ) {
            r.className = r.className.replace(regex,' '+className2+' ');
        }
        else{
            r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
        }
        return r.className;
    };

    //  Creating our button in JS for smaller screens
    var menuElements = document.getElementById('menu');
    menuElements.insertAdjacentHTML('afterBegin','<div id="menutoggle" class="nav-toggle"><i class="glyphicon glyphicon-menu-hamburger"></i></div>');

    //  Toggle the class on click to show / hide the menu
    document.getElementById('menutoggle').onclick = function() {
        changeClass(this, 'nav-toggle active', 'nav-toggle');
    }

    // http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
    document.onclick = function(e) {
        var mobileButton = document.getElementById('menutoggle'),
                buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

        if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
            changeClass(mobileButton, 'navtoogle active', 'navtoogle');
        }
    }
</script>

<div class="container">
    <!-- Notifications -->
    @include('frontend/notifications')
            <!-- Content -->
    @yield('content')
    @if(isset($parent_category->name) && $parent_category->name)
    @endif
</div>

<footer>
    <div class="container">
        <div class="txt_footer">
            <p>Copyright @ 2012 <b>Sở Ngoại Vụ Tỉnh Tuyên Quang</b></p>
            <p>Giấy phép số: 08/GP-TTĐT, Cục quản lý phát thanh, truyền hình và thông tin điện tử - Bộ thông tin về truyền thông cấp ngày 25/01/2013</p>
            <p>Địa chỉ: 4, Chiến thắng sông Lô, P Tân Quang, TP Tuyên Quang</p>
            <p>Điện thoại: 027 3 817 626 | Fax: 027 3 817 133</p>
        </div>
    </div>
</footer>
<div style="clear:both;"></div>
<script>
    if($( "#tabs" ).length){
        $( "#tabs" ).tabs({
            collapsible: false
        });
    }
</script>
</body>

</html>