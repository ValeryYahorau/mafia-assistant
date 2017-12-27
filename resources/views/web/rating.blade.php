@extends('layouts.web')

@section('content')
    <section class="home">

        <div class="row">
            <div class="col-1">
                <div class="widget chart-widget">
                    <div class="widget-header">Глобальный рейтинг</div>
                    <div class="widget-body padding-20">
                        @if ( count($stats)==0 )
                        @else
                            <div class="intro">
                                @if ($hard_type == "red")
                                    <p>Тяжелые игры: <span class="red">красные</span></p>
                                    <p>Коэффициент сложности тяжелых игр: {{ $k }}</p>
                                @endif
                                @if ($hard_type == "black")
                                    <p>Тяжелые игры: <span class="black">черные</span></p>
                                    <p>Коэффициент сложности тяжелых игр: {{ $k }}</p>
                                @endif
                            </div>
                            <div class="line info">
                                <div class="cell place">Место</div>
                                <div class="cell place">Статус</div>
                                <div class="cell name">Ник</div>
                                <div class="cell real-name">ФИО</div>
                                <div class="cell info">Инфо</div>
                                <div class="cell rating">Рейтинг</div>
                            </div>
                            @foreach( $stats as $index => $player )
                                <div class="line entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
                                    <div class="cell place">{{ $index+1 }} </div>
                                    <div class="cell status">
                                        @if ($player->player->type == "simple")
                                            <img src="{{ asset('web/img/simple.png') }}"/><span>Дерево</span>
                                        @endif
                                        @if ($player->player->type == "bronze")
                                            <img src="{{ asset('web/img/bronze.png') }}"/><span>Бронза</span>
                                        @endif
                                        @if ($player->player->type == "silver")
                                            <img src="{{ asset('web/img/silver.png') }}"/><span>Серебро</span>
                                        @endif
                                        @if ($player->player->type == "gold")
                                            <img src="{{ asset('web/img/gold.png') }}"/><span>Золото</span>
                                        @endif
                                        @if ($player->player->type == "platinum")
                                            <img src="{{ asset('web/img/platinum.png') }}"/><span>Платина</span>
                                        @endif
                                    </div>
                                    <div class="cell name">{{ $player->player->name_ru }}<br>{{ $player->player->name_en }}</div>
                                    <div class="cell real=name">{{ $player->player->real_name }}</div>
                                    <div class="cell info info-small">
                                        Всего игры: {{ $player->total_game_count }} Побед: {{ $player->win_count }}
                                        Поражений: {{ $player->lose_count }}
                                        <br>
                                        Доп баллы: {{ $player->additional_points }}
                                    </div>
                                    <div class="cell rating">{{ number_format($player->rating, 3) }} </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

