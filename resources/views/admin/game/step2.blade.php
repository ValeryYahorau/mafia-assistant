@extends('layouts.game')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/fancybox/jquery.fancybox.css') }}">
@endsection

@section('content')
    <div class="admin-content top game-content">
        <div class="head">
            <h2>Игра # {{$game->id}} / Тип игры: <strong>
                @if ($game->type == "simple") Фановая @endif
                    @if ($game->type == "rating") Рейтинговая @endif</strong>
            </h2>
            <h1>Покажите цвета игрокам</h1>
        </div>
        <div class="entity-form">

            <form action="{{ LaravelLocalization::localizeURL('/admin/save-game-step2') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="game_id" value="{{ $game->id }}">

                <div class="table">
                    <div class="l">
                        @foreach( $gameplayers as $index => $gameplayer )
                            @if ($gameplayer->position < 6)
                                <input type="hidden" name="player{{ $gameplayer->position }}" value="{{ $gameplayer->player->id }}">
                                <div class="form-group {{ $index% 2 == 0 ? ' odd' : 'even' }}">
                                    <label>Игрок #{{ $gameplayer->position }}</label>
                                    <div class="name">{{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}</div>
                                    @if ($gameplayer->role == "red")
                                        <a href="{{ asset('noc_admin/img/red.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "sheriff")
                                        <a href="{{ asset('noc_admin/img/sheriff.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "black")
                                        <a href="{{ asset('noc_admin/img/black.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "don")
                                        <a href="{{ asset('noc_admin/img/don.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="r">
                        @foreach( $gameplayers as $index => $gameplayer )
                            @if ($gameplayer->position > 5)
                                <input type="hidden" name="player{{ $gameplayer->position }}" value="{{ $gameplayer->player->id }}">
                                <div class="form-group {{ $index% 2 == 0 ? ' odd' : 'even' }}">
                                    <label>Игрок #{{ $gameplayer->position }}</label>
                                    <div class="name">{{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}</div>
                                    @if ($gameplayer->role == "red")
                                        <a href="{{ asset('noc_admin/img/red.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "sheriff")
                                        <a href="{{ asset('noc_admin/img/sheriff.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "black")
                                        <a href="{{ asset('noc_admin/img/black.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                    @if ($gameplayer->role == "don")
                                        <a href="{{ asset('noc_admin/img/don.jpg') }}" data-fancybox class="show-role btn btn-yellow">
                                            Показать роль
                                        </a>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group buttons">
                    <button type="submit" class="btn btn-yellow">Цвета розданы, начать игру</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/fancybox/jquery.fancybox.js') }}"></script>
@endsection
