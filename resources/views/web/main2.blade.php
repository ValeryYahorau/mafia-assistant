@extends('layouts.web')

@section('content')
<section class="home animatedParent animateOnce">
    <div class="overlay_light"></div>
    <!--
        @if ( $line->count() )
            <div class="line">
                <div class="events-line str_wrap">
                @foreach( $line as $index => $eventLine )
                    <p>
                        <i class="fa fa-asterisk"></i>
                        <a href="{{url('/event/'.$eventLine->slug)}}">
                            @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                {{ $eventLine->short_title_en }}
                            @else 
                                {{ $eventLine->short_title_ru }}
                            @endif
                            @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                {{ $eventLine->short_desc_en }}
                            @else 
                                {{ $eventLine->short_desc_ru }}
                            @endif 
                        </a>
                    </p>
                @endforeach  
                </div>
            </div>             
        @endif    -->

        <div class="section-title">
            <div class="top-line animated fadeInRight delay-1000"></div>
            <div class="cell">
                <div class="wrapper animated fadeInLeft delay-500">
                    <h2 class="">@lang('web.at')</h2>
                    <h1 class="">@lang('web.ca')</h1>
                </div>
            </div>
            <div class="bottom-line animated fadeInLeft delay-1500"></div>
        </div>
        
    </section>   
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/js/jquery.liMarquee.js') }}"></script>
    
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.events-line').liMarquee({   

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
