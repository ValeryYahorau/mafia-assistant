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
            <h1>Проставьте доп балы и выберите результат игры</h1>
            <a class="btn btn-small btn-green hide" href="#" id="hide-roles">Спрятать роли</a>
            <a class="btn btn-small btn-red" href="#" id="show-roles">Показаьт роли</a>
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
                                            <div class="role-block red hide"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "sheriff")
                                            <div class="role-block red sheriff hide"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "black")
                                            <div class="role-block black hide"><i class="fa fa-frown-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "don")
                                            <div class="role-block black don hide"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                        @endif
                                        {{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}
                                    </div>
                                    <div class="">
                                        <label>Доп балы</label>
                                        <input class="form-control" step="0.01" name="additional_points_{{ $gameplayer->position }}" type="number"
                                               value="0">
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
                                            <div class="role-block red hide"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "sheriff")
                                            <div class="role-block red sheriff hide"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "black")
                                            <div class="role-block black hide"><i class="fa fa-frown-o" aria-hidden="true"></i></div>
                                        @elseif($gameplayer->role == "don")
                                            <div class="role-block black don hide"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                        @endif
                                        {{ $gameplayer->player->name_ru }}/{{ $gameplayer->player->name_en }}
                                    </div>
                                    <div class="">
                                        <label>Доп балы</label>
                                        <input class="form-control" step="0.01" name="additional_points_{{ $gameplayer->position }}" type="number"
                                               value="0">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group buttons">
                    <div class="result-choise red">
                        {{ Form::radio('result', 'red_win') }}
                        <label>Победа красных</label>
                    </div>
                    <div class="result-choise">
                        {{ Form::radio('result', 'black_win_3_3') }}
                        <label>Победа черных 3 в 3</label>
                    </div>
                    <div class="result-choise">
                        {{ Form::radio('result', 'black_win_2_2') }}
                        <label>Победа черных 2 в 2</label>
                    </div>
                    <div class="result-choise">
                        {{ Form::radio('result', 'black_win_1_1') }}
                        <label>Победа черных 1 в 1</label>
                    </div>
                    <div class="result-choise white">
                        {{ Form::radio('result', 'draw') }}
                        <label>Ничья</label>
                    </div>
                    <button type="submit" class="btn btn-yellow margin-top hide">Закончить игру</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/fancybox/jquery.fancybox.js') }}"></script>
    <script type="text/javascript">
        $("#show-roles").click(function () {
            $(".role-block").removeClass("hide");
            $("#show-roles").addClass("hide");
            $("#hide-roles").removeClass("hide");
        });
        $("#hide-roles").click(function () {
            $(".role-block").addClass("hide");
            $("#hide-roles").addClass("hide");
            $("#show-roles").removeClass("hide");
        });
        $('input[type="radio"]').click(function () {
            $(".margin-top").removeClass("hide");
        });
    </script>
@endsection
