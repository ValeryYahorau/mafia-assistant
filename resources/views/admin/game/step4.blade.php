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
            <h1>Игра закончилась</h1>
        </div>
        <div class="entity-form">

            <form action="{{ LaravelLocalization::localizeURL('/admin/save-game-step3') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="game_id" value="{{ $game->id }}">

                <div class="table">
                    <div class="l">
                        @foreach( $gameplayers as $index => $gameplayer )
                            @if ($gameplayer->position < 6)
                                <div class="form-group {{ $index% 2 == 0 ? ' odd' : 'even' }}">
                                    <label>Игрок #{{ $gameplayer->position }}</label>
                                    <div class="name">
                                        @if ($gameplayer->role == "red")
                                            <div class="role-block red"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "sheriff")
                                            <div class="role-block red sheriff"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "black")
                                            <div class="role-block black"><i class="fa fa-frown-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "don")
                                            <div class="role-block black don"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                        @endif
                                        {{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}
                                    </div>
                                    <div class="">
                                        <label>Балы: {{ $gameplayer->points }}</label>
                                        <label>Доп балы: {{ $gameplayer->additional_points }}</label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="r">
                        @foreach( $gameplayers as $index => $gameplayer )
                            @if ($gameplayer->position > 5)
                                <div class="form-group {{ $index% 2 == 0 ? ' odd' : 'even' }}">
                                    <label>Игрок #{{ $gameplayer->position }}</label>
                                    <div class="name">
                                        @if ($gameplayer->role == "red")
                                            <div class="role-block red"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "sheriff")
                                            <div class="role-block red sheriff"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "black")
                                            <div class="role-block black"><i class="fa fa-frown-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "don")
                                            <div class="role-block black don"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                        @endif
                                        {{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}
                                    </div>
                                    <div class="">
                                        <label>Балы: {{ $gameplayer->points }}</label>
                                        <label>Доп балы: {{ $gameplayer->additional_points }}</label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group buttons">
                    @if ($game->result == "red_win")
                        <div class="result-choise red center">
                            <label>Победа красных</label>
                        </div>
                    @elseif($game->result == "black_win_3_3")
                        <div class="result-choise center">
                            <label>Победа черных 3 в 3</label>
                        </div>
                    @elseif($game->result == "black_win_2_2")
                        <div class="result-choise center">
                            <label>Победа черных 2 в 2</label>
                        </div>
                    @elseif($game->result == "black_win_1_1")
                        <div class="result-choise center">
                            <label>Победа черных 1 в 1</label>
                        </div>
                    @elseif($game->result == "draw center")
                        <div class="result-choise white">
                            <label>Ничья</label>
                        </div>
                    @endif

                    <a href="{{url('/admin/games')}}" class="btn btn-yellow margin-top">Все игры</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/fancybox/jquery.fancybox.js') }}"></script>
@endsection
