@extends('layouts.web')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/plugins/magnific-popup/mfp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/photos.css') }}">   
@endsection

@section('content')
<div class="content tours animatedParent animateOnce">

    <a href="#">
    <div class="item animated fadeInDownShort delay-250 minslow">
      <div class="info">
        <div class="wr1">
          <div class="wr2"> 
            <h1>{{ $item->title }}</h1>
            <p>{{ $item->short_desc }}</p>
          </div>
        </div>
      </div>
      <div class="image" style="background-image: url('{{Config::get('noccms.img_path')}}{{ $item->img_path }}')"></div>
    </div>
    </a>

            <div class="intro animated fadeInDownShort delay-250 minslow">
                <h1 class="animated fadeInDownShort delay-250 minslow">About {{ $item->title }}</h1>     
                {!! $item->body !!}    
            </div>

            <div class="intro">
                <h1 class="animated fadeInDownShort delay-250 minslow">Photos</h1>                              
                <div class="photos-wr">
                    <section class="portfolio portfolio-col-md-4 portfolio-col-sm-2 portfolio-col-xs-1 bg-inverse" id="portfolio-1">
                        @foreach( $item->photos as $photo )
                            <div class="portfolio-project">
                                <a href="{{url('/')}}{{Config::get('noccms.img_path')}}{{$photo->img_s_path}}" class="portfolio-project-lightbox">
                                    <div class="portfolio-project-details">
                                        <div class="portfolio-vertical-center">
                                            <div class="portfolio-project-title">{{ $item->title }}</div>
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
                </div>
            </div>
        </div>
              
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('web/js/animatedModal.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/magnific-popup/mfp.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/imagesloaded/imagesloaded.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/isotope/isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/plugins/detectmobile/detectmobile.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/portfolio.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
        $(window).load(function() {
          setTimeout(function(){
              $('body').addClass('loaded');        
              $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset("web/css/animations.css") }}">');   
          }, 1000);
        });
    </script> 
@endsection
