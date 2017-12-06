@extends('layouts.web')

@section('content')
        <div class="content about animatedParent animateOnce">
            <div class="wrapper">
                <h1 class="animated fadeInDownShort delay-250 minslow">Belarus - Minsk</h1>
                <div class="wrapper2">
                    <div class="l"></div>
                    <div class="c">
                        <div class="top"></div>
                        <div class="bottom"></div>    
                    </div>
                    <div class="r"></div>
                </div>
                
                <p  class="center animated fadeInDownShort delay-500 minslow">"Travelling - it leaves you speechless, then turns you into a storyteller." <br/><br/>Our company welcomes you to one of the most exciting  countries in the Eastern-Europe. With the best whole-sale prices to travel agencies, we have the opportunity to offer our dear clients the best deals including airplane tickets, hotels, sight-seeings, nightlife entertainment and the chance to discover all the beauty of Belarus.

                "24h service, enjoyment, safety" are our keywords. <br/><br/>Travelling to Belarus with our company, we can assure you one of the happiest ,moments of your life. </p>                              
                <p class="center animated fadeInDownShort delay-750 minslow">Sincerly yours, Ezel Crespin</p>  

                <div id="youtube-video" class="animated fadeInDownShort delay-1000 minslow">
                    <iframe width="100%" height="100%" src="http://www.youtube.com/embed/yMiGjuCY0xE"></iframe>
                </div>       
            </div>

        </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var vWidth =$(document).width()*0.45;
            $('#youtube-video').width(vWidth);
            $('#youtube-video').height(vWidth*0.59);
        });
        $(window).load(function() {
          setTimeout(function(){
              $('body').addClass('loaded');        
              $('head').append('<link rel="stylesheet" type="text/css" href="{{ asset("web/css/animations.css") }}">');   
          }, 1000);
        });
    </script>   
@endsection
