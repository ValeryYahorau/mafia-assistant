@extends('layouts.web')

@section('content')
    <div class="content contacts animatedParent animateOnce">

        <div class="contacts-block">
          <div class="wrapper">
            <h1 class="animated fadeInUpShort delay-500 minslow">Phones:</h1>
            <p class="animated fadeInUpShort delay-750 minslow">{!! $phone1->value !!}</p>
            <p class="animated fadeInUpShort delay-750 minslow">{!! $phone2->value !!}</p>
            <p class="animated fadeInUpShort delay-750 minslow">{!! $phone3->value !!}</p>
            <h1 class="top-line animated fadeInUpShort delay-500 minslow">Email:</h1>
            <p class="animated fadeInUpShort delay-750 minslow">{!! $email->value !!}</p>
            <h1 class="top-line animated fadeInUpShort delay-500 minslow">Location</h1>
            <p class="animated fadeInUpShort delay-750 minslow">{!! $address->value !!}</p>
            <h1 class="top-line animated fadeInUpShort delay-500 minslow">Social networks:</h1>
            <p class="animated fadeInUpShort delay-750 minslow">
                <a target="_blank" href="https://www.instagram.com/landofbeauties.party/">
                    <i class="fa fa-instagram"></i>
                </a>
            </p>
          </div>  
        </div>
        <div class="map" id="map"></div>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyCGSHLXPy1aSiRPAxNNChFGgDShxYbcYp8"></script>      
    <script type="text/javascript" src="{{ asset('web/js/map/map.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/map/map-infobox.js') }}"></script>   

    <script type="text/javascript">
        var Lat = 53.904718;
        var Lng = 27.534345;    
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
