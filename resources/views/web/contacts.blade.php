@extends('layouts.web')

@section('content')
<section class="contacts animatedParent animateOnce">
    <div class="overlay_light"></div>
    <div class="contacts-block animatedParent">
        <div class="wrapper animated fadeInLeft delay-750">
            <div class="wrapper2 ">
                @if ( LaravelLocalization::getCurrentLocale() == "en") 
                    <div class="item">
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-phone"></i> Phone</h1>
                        <p class="animated fadeInLeft delay-1000 go">+375 (29) 106-000-4</p>
                        <p class="animated fadeInLeft delay-1000 go">+375 (29) 75-111-75</p>
                    </div>
                    <div class="item">  
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-map-marker"></i> Address</h1>
                        <p class="desktop animated fadeInLeft delay-1000 go">55 Kiseleva st., Office 2, Minsk, Belarus</p>
                        <a class="mobile animated fadeInRight delay-1000 go" target="_blank" href="https://www.google.by/maps/place/%D1%83%D0%BB.+%D0%9A%D0%B8%D1%81%D0%B5%D0%BB%D0%B5%D0%B2%D0%B0+55,+%D0%9C%D0%B8%D0%BD%D1%81%D0%BA/@53.9149462,27.5591692,18z/data=!4m2!3m1!1s0x46dbcf90cdd6c08d:0xf0abdeb5d8e9a1a"><p>55 Kiseleva st., Office 2, Minsk, Belarus</p></a>
                    </div>
                    <div class="item">
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-email"></i> Email</h1>
                        <p class="animated fadeInLeft delay-1000 go">belbilet@gmail.com</p>
                    </div>   

                @else 
                    <div class="item">
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-phone"></i> Телефон</h1>
                        <p class="animated fadeInLeft delay-1000 go">+375 (29) 106-000-4</p>
                        <p class="animated fadeInLeft delay-1000 go">+375 (29) 75-111-75</p>
                    </div>
                    <div class="item">  
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-map-marker"></i> Адрес</h1>
                        <p class="desktop animated fadeInLeft delay-1000 go">г. Минск, ул. Киселева, 55-2</p>
                        <a class="mobile animated fadeInRight delay-1000 go" target="_blank" href="https://www.google.by/maps/place/%D1%83%D0%BB.+%D0%9A%D0%B8%D1%81%D0%B5%D0%BB%D0%B5%D0%B2%D0%B0+55,+%D0%9C%D0%B8%D0%BD%D1%81%D0%BA/@53.9149462,27.5591692,18z/data=!4m2!3m1!1s0x46dbcf90cdd6c08d:0xf0abdeb5d8e9a1a"><p>г. Минск, ул. Киселева, 55-2</p></a>
                    </div>
                    <div class="item">
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-email"></i> Email</h1>
                        <p class="animated fadeInLeft delay-1000 go">belbilet@gmail.com</p>
                    </div> 
                    <div class="item">
                        <h1 class="animated fadeInLeft delay-1000 go"><i class="fa fa-email"></i> Соц сети</h1>
                        <div class="sn">
                            <a target="_blank" href="https://vk.com/atom_entertainment">
                                <i class="fa fa-vk"></i>
                            </a>
                            <a target="_blank" href="https://instagram.com/atom_enter/">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a target="_blank" href="https://www.facebook.com/atomenter.by">                
                                <i class="fa fa-facebook"></i>
                            </a>    
                            <a target="_blank" href="http://ok.ru/profile/572115401195">                
                                <i class="fa fa-odnoklassniki"></i>
                            </a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCHqW5_gxxT86b76TJGVacbg">       
                                <i class="fa fa-youtube"></i>
                            </a>
                        </div>
                    </div>                                          
                @endif            
            </div>
        </div>  
    </div>
    <div class="map" id="map"></div>
</section>   
@endsection

@section('page-js')
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>  
    <script type="text/javascript" src="{{ asset('web/js/map.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('web/js/map-infobox.js') }}"></script>

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
