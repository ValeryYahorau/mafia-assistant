@extends('layouts.web')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('web/css/slider.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="bannerscollection_zoominout_opportune">
            <div class="myloader"></div>
            <!-- CONTENT -->
            <ul class="bannerscollection_zoominout_list">
                <li data-text-id="#text2" data-initialZoom="0.78" data-finalZoom="1">
                  <img src="{{ asset('web/img/home2.jpg') }}" alt="" width="2500" height="1570" />
                </li>
                <li data-text-id="#text1" data-initialZoom="0.78" data-finalZoom="1" >
                  <img src="{{ asset('web/img/home1.jpg') }}" alt="" width="2500" height="1570" />
                </li>
                <li data-text-id="#text3" data-initialZoom="0.78" data-finalZoom="1">
                  <img src="{{ asset('web/img/home3.jpg') }}" alt="" width="2500" height="1570"/>
                </li>                 
                <li data-text-id="#text4" data-initialZoom="0.78" data-finalZoom="1">
                    <img src="{{ asset('web/img/home4.jpg') }}" alt="" width="2500" height="1570" />
                </li>
                <li data-text-id="#text5" data-initialZoom="0.78" data-finalZoom="1">
                    <img src="{{ asset('web/img/home5.jpg') }}" alt="" width="2500" height="1570" />
                </li>      
            </ul>    
              <!-- TEXTS -->             
            <div id="text2" class="bannerscollection_zoominout_texts">
                <div class="bannerscollection_zoominout_text_line title1" data-initial-left="550" data-initial-top="170" data-final-left="100" data-final-top="170" data-duration="0.5" data-fade-start="0" data-delay="0">beautiful</div>
                <div class="bannerscollection_zoominout_text_line title2" data-initial-left="50" data-initial-top="230" data-final-left="100" data-final-top="230" data-duration="0.5" data-fade-start="0" data-delay="1">cities</div>
            </div> 

            <div id="text1" class="bannerscollection_zoominout_texts">
                <div class="bannerscollection_zoominout_text_line title1" data-initial-left="550" data-initial-top="170" data-final-left="100" data-final-top="170" data-duration="0.5" data-fade-start="0" data-delay="0">beautiful</div>
                <div class="bannerscollection_zoominout_text_line title2" data-initial-left="50" data-initial-top="230" data-final-left="100" data-final-top="230" data-duration="0.5" data-fade-start="0" data-delay="1">nature</div>
            </div>    

            <div id="text3" class="bannerscollection_zoominout_texts">
                <div class="bannerscollection_zoominout_text_line title1" data-initial-left="550" data-initial-top="170" data-final-left="100" data-final-top="170" data-duration="0.5" data-fade-start="0" data-delay="0">beautiful</div>
                <div class="bannerscollection_zoominout_text_line title2" data-initial-left="50" data-initial-top="230" data-final-left="100" data-final-top="230" data-duration="0.5" data-fade-start="0" data-delay="1">people</div>
            </div>   
            
            <div id="text4" class="bannerscollection_zoominout_texts">
                <div class="bannerscollection_zoominout_text_line title1" data-initial-left="550" data-initial-top="170" data-final-left="100" data-final-top="170" data-duration="0.5" data-fade-start="0" data-delay="0">beautiful</div>
                <div class="bannerscollection_zoominout_text_line title2" data-initial-left="50" data-initial-top="230" data-final-left="100" data-final-top="230" data-duration="0.5" data-fade-start="0" data-delay="1">history</div>
             </div>    
               
            <div id="text5" class="bannerscollection_zoominout_texts">
                <div class="bannerscollection_zoominout_text_line finaltitle1" data-initial-left="150" data-initial-top="170" data-final-left="150" data-final-top="170" data-duration="0.75" data-fade-start="0" data-delay="0">Welcome</div>
                <div class="bannerscollection_zoominout_text_line finaltitle2" data-initial-left="155" data-initial-top="230" data-final-left="155" data-final-top="230" data-duration="0.75" data-fade-start="0" data-delay="1">Belarus - Land of Beauties</div>
            </div>  
        </div> 
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
