@extends('layouts.web')

@section('content')
<section class="news animatedParent animateOnce">
    <div class="overlay_light"></div>
    <div class="title">
        <h1>@lang('web.news')</h1>
    </div>
    <div class="news-block">
        <div class="wrapper">
            @if ( $news->count() )
                @foreach( $news as $index => $snews )
                    <div class="item">
                        <a href="{{url('/news/'.$snews->slug)}}">
                            <div class="top">
                                <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$snews->img_path}}"/>
                            </div>
                            <div class="bottom">
                                <div class="category">
                                    @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                        {{ $snews->category_en }}
                                    @else 
                                        {{ $snews->category_ru }}
                                    @endif                                        
                                </div>           
                                <h1>
                                    @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                        {{ $snews->title_en }}
                                    @else 
                                        {{ $snews->title_ru }}
                                    @endif
                                </h1>        
                                <p>
                                    @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                        {{ $snews->short_desc_en }}
                                    @else 
                                        {{ $snews->short_desc_ru }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>                            
                @endforeach               
            @endif                          
        </div>
    
    </div>        
</section>   
@endsection

@section('page-js')

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('web/js/jquery.grid-a-licious.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //$('.news-block .wrapper').pinto({itemSelector: '.item',
            $(".news-block .wrapper").gridalicious(
                {
                    width: 280,
                    gutter: 5
                }
            );
        });
        $(window).load(function() {
            setTimeout(function(){
                $('body').addClass('loaded');
                $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset('web/css/animations.css') }}">');
            }, 100);
        });
    </script>
@endsection
