@extends('layouts.web')

@section('content')
<section class="events animatedParent animateOnce">
    <div class="overlay_light"></div>
        <!--@if ( $line->count() )
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

        <div class="section-events section-events1">         
            @if ( $events->count() )
                <h2 class="title  animated fadeInDown delay-1000 minslow go">@lang('web.future_events')</h2>
                <div class="row animatedParent animateOnce">
                @foreach( $events as $index => $event )
                    <div class="item animated fadeInDown delay-750 minslow go">
                        <a href="{{url('/event/'.$event->slug)}}">
                            <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}"/>
                            <div class="desc">
                                <div class="desc2">
                                    <h1>
                                        @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                            {{ $event->short_title_en }}
                                        @else 
                                            {{ $event->short_title_ru }}
                                        @endif
                                    </h1>
                                    <h2>
                                        @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                            {{ $event->short_desc_en }}
                                        @else 
                                            {{ $event->short_desc_ru }}
                                        @endif                                    
                                    </h2>
                                </div>
                            </div>
                        </a>
@if (str_contains($event->button, 'http'))
							<button class="" onclick="window.open('{{ $event->button }}','_blank')">@lang('web.buy')</button>
                        @elseif(is_null($event->button))
                        @elseif(empty($event->button))
						@else
                        	<button class="" onclick="window.biletiBy.link('{{$event->button}}')">@lang('web.buy')</button>
                        @endif                  
                    </div>
                @endforeach   
                </div>            
            @endif                    
        </div>

        <div class="section-events section-events2">            
            @if ( $pastevents->count() )
                <h2 class="title  animated fadeInDown delay-1000 minslow go">@lang('web.past_events')</h2>
                <div class="row animatedParent animateOnce">
                @foreach( $pastevents as $index => $event )
                    <div class="item animated fadeInDown delay-750 minslow go">
                        <a href="{{url('/event/'.$event->slug)}}">
                            <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}"/>
                            <div class="desc">
                                <div class="desc2">
                                    <h1>
                                        @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                            {{ $event->short_title_en }}
                                        @else 
                                            {{ $event->short_title_ru }}
                                        @endif
                                    </h1>
                                    <h2>
                                        @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                            {{ $event->short_desc_en }}
                                        @else 
                                            {{ $event->short_desc_ru }}
                                        @endif                                    
                                    </h2>
                                </div>
                            </div>
                        </a>                  
                    </div>
                @endforeach  
                </div>             
            @endif                    
        </div>        
    </section>   
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/js/jquery.liMarquee.js') }}"></script>
    <script src="http://shop.bileti.by/js/client.js"></script>    
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
