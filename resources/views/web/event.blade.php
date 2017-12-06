@extends('layouts.web')

@section('page-css')
@if ( LaravelLocalization::getCurrentLocale() == "en") 
    <meta property="vk:title" content="{{ $event->title_en }}" />
	<meta property="vk:description" content="{{ $event->title_en }}">
    <meta property="og:title" content="{{ $event->title_en }}">
    <meta property="og:description" content="{{ $event->title_en }}">	    
@else
    <meta property="vk:title" content="{{ $event->title_ru }}" /> 
	<meta property="vk:description" content="{{ $event->title_ru }}">
    <meta property="og:title" content="{{ $event->title_ru }}">
    <meta property="og:description" content="{{ $event->title_ru }}">		     
@endif
    <meta property="vk:image" content="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}" />  
    <meta property="vk:url" content="{{url('/event/'.$event->slug)}}" /> 
    <meta property="og:image" content="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="http://www.atomenter.by">
@endsection

@section('content')
<section class="event animatedParent animateOnce">
    <div class="overlay_dark"></div>  

        <div class="section-events single-event">
            <div class="row animatedParent animateOnce">
                <div class="item left animated fadeInLeft delay-750 minslow go">
                    <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}"/>
                    @if (str_contains($event->button, 'http'))
                        <button class=""pulse2 onclick="window.open('{{ $event->button }}','_blank')">@lang('web.buy')</button>
                    @elseif(is_null($event->button))
                    @elseif(empty($event->button))
                    @else
                        <button class="pulse2" onclick="window.biletiBy.link('{{$event->button}}')">@lang('web.buy')</button>
                    @endif 

                </div>
                <div class="item right animated fadeInRight delay-1250 minslow go">	
                    @if (str_contains($event->button, 'http'))
                    	<button class=""pulse2 onclick="window.open('{{ $event->button }}','_blank')">@lang('web.buy')</button>
                    @elseif(is_null($event->button))
                    @elseif(empty($event->button))
                    @else
                    	<button class="pulse2" onclick="window.biletiBy.link('{{$event->button}}')">@lang('web.buy')</button>
                    @endif 

  
                    <div class="desc">
                        <h1>
                            @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                {{ $event->title_en }}
                            @else 
                                {{ $event->title_ru }}
                            @endif
                        </h1>
                            @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                {!! $event->body_en !!}
                            @else 
                                {!! $event->body_ru !!}
                            @endif                        
                    </div>      
                </div>
            </div>            
        </div>

    </div>
</section>   
@endsection

@section('page-js')
    <script src="http://shop.bileti.by/js/client.js"></script>    
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function() {

        });
        $(window).load(function() {
            setTimeout(function(){
                $('body').addClass('loaded');
                $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset('web/css/animations.css') }}">');
            }, 100);
        });
    </script>    
@endsection
