@extends('layouts.web')

@section('content')
<section class="home animatedParent animateOnce">
    <div class="overlay_light"></div>
    
        @if ( $line->count() )
            <div class="slider">
              <ul class="rslides">
                @foreach( $line as $index => $eventLine )
                    <li><<img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$eventLine->img_path2}}"/></li>
                @endforeach 
              </ul> 
            </div>             
        @endif    <!--
        <div class="slider">
            <ul class="rslides">
              <li><img src="{{ asset('web/img/1.jpg') }}" alt=""></li>
              <li><img src="{{ asset('web/img/2.jpg') }}" alt=""></li>
              <li><img src="{{ asset('web/img/3.jpg') }}" alt=""></li>
            </ul>
        </div>
-->
        <div class="section-title">
            <div class="cell">
                <div class="wrapper ">
                    <h1>Atom M</h1>
                    <h2 class="">Атом M" на все 100 оправдывает свое название, предлагая белорусской публике зрелищные и качественные шоу .<br/>Концепция компании проста как атом: устраивать "большой взрыв" в мире развлечений!</h2>
                </div>
            </div>
        </div>
        
    </section>   
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/js/plugins/responsiveslides/responsiveslides.min.js') }}"></script>
    
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".rslides").responsiveSlides({
              auto: true,             // Boolean: Animate automatically, true or false
              speed: 500,            // Integer: Speed of the transition, in milliseconds
              timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
              pager: false,           // Boolean: Show pager, true or false
              nav: true,             // Boolean: Show navigation, true or false
              random: false,          // Boolean: Randomize the order of the slides, true or false
              pause: false,           // Boolean: Pause on hover, true or false
              pauseControls: true,    // Boolean: Pause when hovering controls, true or false
              prevText: "Previous",   // String: Text for the "previous" button
              nextText: "Next",       // String: Text for the "next" button
              maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
              navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
              manualControls: "",     // Selector: Declare custom pager navigation
              namespace: "rslides",   // String: Change the default namespace used
              before: function(){},   // Function: Before callback
              after: function(){}     // Function: After callback
            });
        });
        $(window).load(function() {
            setTimeout(function(){
                $('body').addClass('loaded');
                $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset('web/css/animations.css') }}">');
            }, 100);
        });
    </script>
@endsection
