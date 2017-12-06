@extends('layouts.web')

@section('content')
    <div class="content tours animatedParent animateOnce">

        <div class="intro animated fadeInDownShort delay-250 minslow">
            <h1 class="">{{ $category->title }}</h1>                              
            {!! $category->description !!}
            
        </div>

        @if ( $items->count() )
            @foreach( $items as $index => $item )

                <a href="{{url('/item/'.$item->slug)}}">
                @if ( $index%2==0 ) 
                    <div class="item animated fadeInLeftShort delay-500 minslow">
                      <div class="image" style="background-image: url('{{Config::get('noccms.img_path')}}{{ $item->img_path }}')"></div>
                      <div class="info">
                        <div class="wr1">
                          <div class="wr2"> 
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->short_desc }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                @else
                    <div class="item animated fadeInRightShort delay-1000 minslow">
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
                @endif
                 </a>

            @endforeach
        @endif

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('web/js/bannerscollection_zoominout.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
        $(window).load(function() {
          setTimeout(function(){
              $('body').addClass('loaded');        
            $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset("web/css/animations.css") }}">');
                setTimeout(function(){
                    jQuery('#bannerscollection_zoominout_opportune').bannerscollection_zoominout({
                      skin: 'opportune',
                      responsive:true,
                      width: 1920,
                      height: 1200,
                      width100Proc:true,
                      height100Proc:true,
                      showNavArrows:true,
                      showBottomNav:true,
                      autoHideBottomNav:true,
                      thumbsWrapperMarginTop: -40,
                      pauseOnMouseOver:false,
                      showPreviewThumbs:false,
                      autoPlay: 6,
                      circleColor: "#ffffff",
                      loop: false
                    });  
                }, 200);    
          }, 1000);
        });
    </script>  
@endsection
