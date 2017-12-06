@extends('layouts.web')

@section('content')
    <div class="content news animatedParent animateOnce">
        <div class="news-block">
        
            <div class="wrapper">
                <h1 class="title animated fadeInDownShort delay-250 minslow">News</h1>

                @if ( $news->count() )
                    @foreach( $news as $index => $snews )
                        <div class="item">
                            <a href="{{url('/news/'.$snews->slug)}}">
                                <div class="top">
                                    <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$snews->img_path}}"/>
                                </div>
                                <div class="bottom">
                                <!--
                                    <div class="category">
                                        {{ $snews->category }}                                      
                                    </div>   -->        
                                    <h1>{{ $snews->title }}</h1>        
                                    <p>{{ $snews->short_desc }}</p>
                                </div>
                            </a>
                        </div>                            
                    @endforeach               
                @endif                          
            </div>
        </div>        
    </div>  
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('web/js/jquery.grid-a-licious.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
              $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset("web/css/animations.css") }}">');   
          }, 1000);
        });
    </script>   
@endsection
