@extends('layouts.web')

@section('content')
<section class="photos animatedParent animateOnce">
    <div class="overlay_light"></div>
        <div class="title">
            <h1>@lang('web.photoreports')</h1>
        </div>
        <div class="photos-block">
            @if ( $photoreports->count() )
                @foreach( $photoreports as $index => $report )
                    <a href="{{url('/photoreport/'.$report->slug)}}">
                        <div class="item even">
                            <div class="left">
                                <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$report->img_path}}"/>
                            </div>
                            <div class="right">
                                <p>
                                    @if ( LaravelLocalization::getCurrentLocale() == "en") 
                                        {{ $report->title_en }}
                                    @else 
                                        {{ $report->title_ru }}
                                    @endif
                                </p>
                                <div class="button button-light">
                                    <span>@lang('web.read_more')...</span>
                                    <div class="mask"></div>
                                </div>                  
                            </div>
                        </div>
                    </a>
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
