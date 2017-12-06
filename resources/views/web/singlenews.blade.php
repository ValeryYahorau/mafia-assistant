@extends('layouts.web')

@section('content')
<section class="snews animatedParent animateOnce">
    <div class="overlay_light"></div> 
<div class="single-news">
    <div class="wrapper">
        <div class="title">
            <h1>
                @if ( LaravelLocalization::getCurrentLocale() == "en") 
                    {{ $news->title_en }}
                @else 
                    {{ $news->title_ru }}
                @endif                 
            </h1>
            <div class="category">
                @if ( LaravelLocalization::getCurrentLocale() == "en") 
                    {{ $news->category_en }}
                @else 
                    {{ $news->category_ru }}
                @endif 
            </div>
        </div>
        <div class="snews-block">            
            <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$news->img_path}}"/>
            @if ( LaravelLocalization::getCurrentLocale() == "en") 
                {!! $news->body_en !!}
            @else 
                {!! $news->body_ru !!}
            @endif                                                  
        </div>
        <div class="date">{{ $news->date }}</div>
    </div>
</div>    
</section>   
@endsection

@section('page-js')
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
