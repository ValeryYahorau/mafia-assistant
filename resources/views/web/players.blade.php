@extends('layouts.web')

@section('content')
    <section class="home">
        <div class="row">
            <div class="col-1">
                <div class="widget chart-widget">
                    <div class="widget-header">Игроки</div>
                    <div class="widget-body padding-20">
                        <div class="intro">
                            <div class="switch-bar switch-bar-2">
                                <a href="{{url('/players/all')}}" class="{{ $type=="all" ? ' active' : '' }}">Все игроки</a>
                                <a href="{{url('/players/rating')}}" class="{{ $type=="rating" ? ' active' : '' }}">Рейтинговые игроки</a>
                                <a href="{{url('/players/simple')}}" class="{{ $type=="simple" ? ' active' : '' }}">Фановые игроки</a>
                            </div>
                        </div>
                        @if ( count($players)==0 )
                        @else
                            <div class="line info">
                                <div class="cell place">Статус</div>
                                <div class="cell name">Ник</div>
                                <div class="cell real-name">ФИО</div>
                                <div class="cell actions">Подробнее</div>
                            </div>
                            @foreach( $players as $index => $player )
                                <div class="line entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
                                    <div class="cell status">
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
                                    <div class="cell name">
                                        <a href="{{url('/player/'.$player->id)}}">{{ $player->name_ru }}<br>{{ $player->name_en }}</a>
                                    </div>
                                    <div class="cell real-name">{{ $player->real_name }}</div>
                                    <div class="cell actions">
                                        <a class="circle-button" href="{{url('/player/'.$player->id)}}">Подробнее</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

