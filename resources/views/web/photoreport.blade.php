@extends('layouts.web')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/plugins/magnific-popup/mfp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/portfolio.css') }}">
@endsection

@section('content')
<section class="phoreport-info">
    <div class="wrapper">
        <span>
             @if ( LaravelLocalization::getCurrentLocale() == "en") 
                {{ $photoreport->title_en }}
            @else 
                {{ $photoreport->title_ru }}
            @endif
        </span>
    </div>
</section>    
<section class="portfolio portfolio-col-md-4 portfolio-col-sm-2 portfolio-col-xs-1 bg-inverse" id="portfolio-1">
    @foreach( $photoreport->photos as $photo )
        <div class="portfolio-project">
            <a href="{{url('/')}}{{Config::get('noccms.img_path')}}{{$photo->img_s_path}}" class="portfolio-project-lightbox">
                <div class="portfolio-project-details">
                    <div class="portfolio-vertical-center">
                        <div class="portfolio-project-title">www.atomenter.by</div>
                    </div>
                    <div class="portfolio-project-actions">
                        <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <div class="portfolio-project-image">
                    <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$photo->img_l_path}}" alt="" />
                </div>
            </a>
        </div>
    @endforeach 
</section>   
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/js/animatedModal.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/magnific-popup/mfp.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/imagesloaded/imagesloaded.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/isotope/isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/detectmobile/detectmobile.js') }}"></script>  

    <script type="text/javascript" src="{{ asset('web/js/portfolio.js') }}"></script>  
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
