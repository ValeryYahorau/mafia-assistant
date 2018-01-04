@extends('layouts.web')

@section('content')
    <section class="home">
        <div class="row">
            <div class="col-2">
                <div class="widget widget-user-info">
                    <div class="widget-header">Игрок</div>
                    <div class="widget-body padding-20 ">
                        <div class="info-line"><span class="pre">Ник: </span> {{$player->name_ru}} / {{$player->name_en}}</div>
                        <div class="info-line"><span class="pre">ФИО: </span> {{$player->real_name}}</div>
                        <div class="info-line"><span class="pre">Количетсво {{ $player->rating ? ' рейтинговых' : 'фановых' }}
                                игр: </span> {{$stat->total_game_count}}</div>
                        <div class="info-line"><span class="pre">Win rate</span> {{ number_format($stat->win_rate, 3) }}%</div>
                        <div class="info-line"><span class="pre red">Win rate за красных</span> {{ number_format($stat->total_red_win_rate, 3) }}%</div>
                        <div class="info-line"><span class="pre black">Win rate за черных</span> {{ number_format($stat->total_black_win_rate, 3) }}%</div>

                    </div>
                </div>
                <div class="row lvl2">
                    <div class="col-2">
                        <div class="widget widget-status">
                            <div class="widget-header">Статус</div>
                            <div class="widget-body padding-20">
                                <div>
                                    @if ($player->type == "simple")
                                        <img src="{{ asset('web/img/simple.png') }}"/><span>Дерево</span>
                                    @endif
                                    @if ($player->type == "bronze")
                                        <img src="{{ asset('web/img/bronze.png') }}"/><span>Бронза</span>
                                    @endif
                                    @if ($player->type == "silver")
                                        <img src="{{ asset('web/img/silver.png') }}"/><span>Серебро</span>
                                    @endif
                                    @if ($player->type == "gold")
                                        <img src="{{ asset('web/img/gold.png') }}"/><span>Золото</span>
                                    @endif
                                    @if ($player->type == "platinum")
                                        <img src="{{ asset('web/img/platinum.png') }}"/><span>Платина</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="widget widget-type">
                            <div class="widget-header">Тип</div>
                            <div class="widget-body padding-20 height-146">
                                @if ($player->rating)
                                    <p class="black margin-top-30">Рейтинговый</p>
                                @else
                                    <p class="red">Фановый</p>
                                    <p class="red info">Необходимо сыграть еще {{20 - $player->games_count}} игр, что бы стать рейтинговым
                                        игроком.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Диаграмма роли</div>
                    <div class="widget-body">
                        <div id="radar"></div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row margin-top-60">
            <div class="col-2">
                <div class="row lvl2">
                    <div class="col-2">
                        <div class="widget widget-role red">
                            <div class="widget-header red">Мирный</div>
                            <div class="widget-body padding-20">
                                <p>{{$stat->red_game_count}} игр</p>
                                <span></span>
                                <p>Win rate: {{$stat->red_win_rate}}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="widget widget-role red">
                            <div class="widget-header red">Шериф</div>
                            <div class="widget-body padding-20">
                                <p>{{$stat->sheriff_game_count}} игр</p>
                                <span></span>
                                <p>Win rate: {{$stat->sheriff_win_rate}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="row lvl2">
                    <div class="col-2">
                        <div class="widget widget-role black">
                            <div class="widget-header black">Мафия</div>
                            <div class="widget-body padding-20">
                                <p>{{$stat->black_game_count}} игр</p>
                                <span></span>
                                <p>Win rate: {{$stat->black_win_rate}}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="widget widget-role black">
                            <div class="widget-header black">Дон</div>
                            <div class="widget-body padding-20">
                                <p>{{$stat->don_game_count}} игр</p>
                                <span></span>
                                <p>Win rate: {{$stat->don_win_rate}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/plugins/zingchart/zingchart.js') }}"></script>
    <script>
        var radarConfig = {
            "backgroundColor": '#FFF',
            "type": "radar",
            "plot": {
                "aspect": "area",
                "background-color": '#FBFCFE',
                "active-area": true
            },
            "plotarea": {
                "margin": 'dynamic'
            },
            "scale-v": {
                "values": "0:100:25",
                "labels": ["", "", "", "", ""],
                "ref-line": {
                    "line-color": "#4ae387"
                },
                "guide": {
                    "line-style": "solid",
                    "line-color": '#D7D8D9'
                }
            },
            "scale-k": {
                "labels": ["Мирный", "Шериф", "Мафия", "Дон"],
                "values": '0:3:1',
                "aspect": "star",
                "guide": {
                    "line-style": "solid",
                    "line-color": "#4ae387",
                },
                "item": {
                    "padding": 5,
                    "font-color": "#1E5D9E",
                    "font-family": 'Montserrat'
                },
            },
            "series": [{
                "values": [{{$stat->red_win_rate}}, {{$stat->sheriff_win_rate}}, {{$stat->black_win_rate}}, {{$stat->don_win_rate}}],
                "background-color": "rgba(74, 227, 135, 0.5)",
                "line-color": "#4ae387"
            }]
        };

        zingchart.render({
            id: 'radar',
            data: radarConfig,
            height: '445',
            width: '99%'
        });
    </script>
@endsection