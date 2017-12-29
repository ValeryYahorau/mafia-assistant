@extends('layouts.web')

@section('content')
    <section class="home">
        <div class="row">
            <div class="col-1">
                <div class="widget chart-widget">
                    <div class="widget-header">{{$player->name_ru}} / {{$player->name_en}}</div>
                    <div class="widget-body padding-20">

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Стиль игрока</div>
                    <div class="widget-body">
                        <div id="radar"></div>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Статистика</div>
                    <div class="widget-body">
                        <div id='black-wins'></div>
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
                "labels": ["Красный", "Шериф", "Черный", "Дон"],
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
                "values": [89, 72, 23, 34],
                "background-color": "rgba(74, 227, 135, 0.5)",
                "line-color": "#4ae387"
            }]
        };

        zingchart.render({
            id: 'radar',
            data: radarConfig,
            height: '380',
            width: '99%'
        });
    </script>
@endsection