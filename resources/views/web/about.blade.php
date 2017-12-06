@extends('layouts.web')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/plugins/magnific-popup/mfp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/portfolio.css') }}">
@endsection

@section('content')
<section class="info animatedParent animateOnce">
    <div class="overlay_light"></div>
    <div class="title">
        <h1>@lang('web.about')</h1>
    </div> 
     @if ( LaravelLocalization::getCurrentLocale() == "en") 
        <div class="info-block">
            <p>Atom Entertainment is a part of company grouping that offers services for organization of public and corporate events, festivals, concerts, BTL and PR activities.
Atom Entertainment was founded in 2012 by a team of professionals with 15 years’ experience in concert business. Korporacija razvlechenij and Art Music Service were created by them.</p><br><p>
Atom Entertainment has already made a name despite the young age. The period of time from 2012 to 2014 was marked by the impressive number of the most famous world stars concerts. Among them are Valerij Meladze, Zemfira, Grigorij Leps, Stas Mihajlov, Valerija, Ani Lorak, Leningrad, Depeche Mode, Moby, Deep Purple, Placebo, Lara Fabian, Lana Del Rey, Ennio Morricone, 30 Seconds to Mars, James Blunt, Marilyn Manson, Garou and many other famous names. Programs Ice Age Live!, Cirque du Soleil as well as Il'ja Averbuh ice show prolong this star list.</p><br><p>
MOST festival has become a real explosion in Belarusian entertainment industry. It was conceived and successfully realized as the live music open-air festival and has become the first Belarusian event of this kind.</p><br><p>
Time-honoured music festival Global Gathering that is held in Belarus since 2008 is one more reason to be proud of. It is a big and unique open-air festival in Belarus that gathered more than 25,000 dance music fans.</p><br><p>
In 2015 Atom Entertainment opened the international GreenFest music festival for Belarus. Dozens of world stars took part in it throughout the history. Legendary American rock band Papa Roach has become the headliner of the first festival. GreenFest will become an annual event in the musical life of the country.
Atom Entertainment justifies its name for 100% offering Belarusian public spectacular and amazing shows.</p><br><p>
Company concept is as simple as atom — to make an explosion in the entertainment world! </p><br><p>
Group of companies is also engaged in the high-level organization of various business events, including sponsorship and charity projects, exhibitions, press conferences, seminars, presentations, workshops and conferences. Group of companies has a lot of successful corporate events, team building and outdoor events, as well as public ones with participation of actors, sports and movie stars, open-air festivals, PR and BTL actions in its portfolio.</p><br><p>
Honouring of the Belarusian champion — FC BATE (2011, 2012, 2013, 2015),The anniversary of Wargaming company (2013), Celebration of the 90th anniversary of OAO BPS-Sberbank founding (2013), Herbalife Extravangza (2014 and 2015), HOG Ralley (2015 and 2016),The 20th anniversary of FC BATE (2016) are landmark projects.</p>



        </div>
        <div class="title title2">
            <h1>Artists' feedback</h1>
        </div>
        <div class="info-block info-block2">
            <section class="portfolio portfolio-col-md-4 portfolio-col-sm-2 portfolio-col-xs-1 bg-inverse" id="portfolio-1">
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en1.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Carl Barat / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en1.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en2.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Fink / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en2.png') }}" alt="" />
                        </div>
                    </a>
                </div>  
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en3.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Hurts / facebook</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en3.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en4.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Hurts / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en4.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en5.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Hurts / twitter</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en5.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en6.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">IAMX / twitter</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en6.png') }}" alt="" />
                        </div>
                    </a>
                </div>  
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en7.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Linkin Park / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en7.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en8.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Linkin Park / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en8.png') }}" alt="" />
                        </div>
                    </a>
                </div> 
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en9.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Linkin Park / twitter</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en9.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en10.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Linkin Park / twitter</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en10.png') }}" alt="" />
                        </div>
                    </a>
                </div>                                      
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en11.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Manowar / facebook</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en11.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en12.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">Manowar / facebook</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en12.png') }}" alt="" />
                        </div>
                    </a>
                </div> 
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en13.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">The NBHD / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en13.png') }}" alt="" />
                        </div>
                    </a>
                </div>
                <div class="portfolio-project">
                    <a href="{{ asset('web/img/en14.png') }}" class="portfolio-project-lightbox">
                        <div class="portfolio-project-details">
                            <div class="portfolio-vertical-center">
                                <div class="portfolio-project-title">WT / instagram</div>
                            </div>
                            <div class="portfolio-project-actions">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="portfolio-project-image">
                            <img src="{{ asset('web/img/en14.png') }}" alt="" />
                        </div>
                    </a>
                </div>                                                                         
            </section>             
        </div>         
    @else           
        <div class="info-block">
           <p>«Атом Итертеймент» входит в группу компаний, предлагающей услуги по организации публичных и корпоративных мероприятий, фестивалей, концертов, BTL- и PR-мероприятий.
«Атом Итертеймент» был образован в 2012 году командой специалистов с 15-летним опытом работы в концертном бизнесе — ими были созданы «Корпорация развлечений» и «Арт Мьюзик Сервис».</p><br><p>
Несмотря на свой молодой возраст, «Атом Интертеймент» уже успел заявить о себе громко. Период с 2012-ого по 2014-ый отмечен для компании внушительным количеством концертов звёзд мировой сцены. Среди них — Валерий Меладзе, Земфира, Григорий Лепс, Стас Михайлов, Валерия, Ани Лорак, Ленинград, Depeche Mode, Moby, Deep Purple, Placebo, Lara Fabian, Lana Del Rey, Ennio Morricone, 30 Seconds to Mars, James Blunt, Marilyn Manson, Garou и другие громкие имена. Этот звездный список продолжают программы «Ice Age Live!», Cirque du Soleil, ледовое шоу Ильи Авербуха.</p><br><p>
Настоящим взрывом в белорусской индустрии развлечений стал фестиваль «МОСТ». Он был задуман и успешно реализован как open-air фестиваль живой музыки, подобных которому в нашей стране еще не было.</p><br><p>
Еще один повод для гордости группы компаний – традиционный музыкальный фестиваль «Global Gathering», который проводится в Беларуси с 2008 года. Это — уникальный и масштабный open-air в Республике, который собрал более 25 000 поклонников танцевальной музыки.</p><br><p>
В 2015-ом «Атом Интертеймент» открыл для Беларуси «GreenFest» — международный музыкальный фестиваль, в истории которого отметились десятки мировых знаменитостей. Хедлайнером первого мероприятия стала легенда американского рока — группа Papa Roach. «GreenFest» обещает стать ежегодным событием в музыкальной жизни страны.
«Атом Интертеймент» на все 100 оправдывает свое название, предлагая белорусской публике зрелищные и качественные шоу .</p><br><p>
Концепция компании проста как атом: устраивать «большой взрыв» в мире развлечений!</p><br><p>
На высоком уровне группа компаний также занимается организацией различного рода бизнес-событий, среди которых спонсорские и благотворительные проекты, выставки и пресс-конференции, семинары и презентации, симпозиумы и конференции. В портфолио группы компаний – множество успешно проведенных корпоративных праздников, тимбилдингов и выездных мероприятий, а также массовые мероприятия c участием артистов, звезд спорта и кино, open-air фестивали, PR и BTL-акции.</p><br><p>
«Чествования Чемпиона Республики Беларусь — футбольного клуба «БАТЭ»» (2011г., 2012г., 2013г., 2015г.), «Юбилей компании Wargaming» (2013г.), Празднование 90-летия со дня основания ОАО «БПС-Сбербанк» (2013г.), «Herbalife Extravangza» (2014г., 2015г.), «H.O.G. Ralley» (2015 г. и 2016г.), «Двадцатилетие футбольного клуба «БАТЭ»» (2016 г.) — самые крупные проекты группы компаний.</p>
        </div>
    @endif 
        
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
