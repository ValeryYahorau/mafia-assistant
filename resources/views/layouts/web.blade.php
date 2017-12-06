<html>
  <head>
    <title>{{$seoTitle}}</title>
    <meta name="keywords" content="{{$seoKeywords}}"/>
    <meta name="description" content="{{$seoDescription}}"/>
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{$seoTitle}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="http://www.landofbeauties.com">
    <meta property="og:description" content="{{$seoDescription}}">
    <meta property="og:image" content="{{ asset('web/img/ogimage.png') }}">
    <link rel="image_src" href="{{ asset('web/img/ogimage.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="shortcut icon" href="{{ asset('web/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('web/img/favicon.ico') }}" type="image/x-icon">
    <!-- css -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/navigation.css') }}">  
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/preload.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/main.css') }}">
    @yield('css')
  </head>
  <body>
    <!-- spinner --> 
    <div id="loader-wrapper">
      <div class="spinner">
        <div class="loader">Loading</div>
      </div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>   

    <!-- page -->
    <nav class="pushy pushy-left">
        <div class="logo-nav">
            <a href="{{url('/')}}">
                <img src="{{ asset('web/img/logo.jpg') }}">
            </a>
        </div>
        <ul>
            @include('web.include.nav')
        </ul>
    </nav>
    <div class="site-overlay"></div>
    <section class="home" id="container">
       
        <header class="animatedParent animateOnce">
            <div class="wrapper">
                <div class="menu-btn animated fadeInLeftShort delay-500 minslow">
                    <div class="nav_button button_index active">
                        <ul><li></li><li></li><li></li><li></li><li></li><li></li></ul>
                    </div>  
                    <p>MENU</p>
                </div>
                <div class="logo-nav animated fadeInRightShort delay-500 minslow">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('web/img/logo.jpg') }}">
                    </a>
                </div>                
                <nav id="menu" class="menu">
                    <div class="menu_inner">
                        <ul class="animated fadeInLeftShort delay-250 minslow"> 
                            @include('web.include.nav')
                        </ul>
                    </div>
                </nav>
            </div>
        </header>    

        @yield('content')

        <footer>
            <div class="wrapper">
                <div class="left"><p>www.landofbeauties.com</p></div>
                <div class="center"><p>www.landofbeauties.com</p></div>
                <div class="right">
                    <a href="http://nocoffees.com" target="_blank" alt="N.O.COFFEE web studio" class="author stretchLeft">
                        <p>created by:</p>
                        <img src="{{ asset('web/img/nocoffee.png') }}">
                    </a>
                </div>
            </div>
        </footer>
    </section>

    <script type="text/javascript" src="{{ asset('web/js/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/pushy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/main.js') }}"></script>

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('web/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/jquery.ui.touch-punch.min.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('web/js/css3-animate-it.js') }}"></script>

    @yield('js')  
  
  </body>
</html>