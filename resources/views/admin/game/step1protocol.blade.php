@extends('layouts.game')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/chosen/chosen.min.css') }}">
@endsection

@section('content')
    <div class="admin-content top game-content">
        <div class="head">
            <h1>Выберите игроков</h1>
        </div>
        <div class="entity-form">

            <form action="{{ LaravelLocalization::localizeURL('/admin/save-protocol') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table">
                    <div class="l">

                        <div class="form-group odd">
                            <label>Игрок #1</label>
                            <div class="">
                                <select name="player1" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player1'))
                                <span class="help-block">{{ $errors->first('player1') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_1" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_1', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_1', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_1', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_1', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group even ">
                            <label>Игрок #2</label>
                            <div class="">
                                <select name="player2" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player2'))
                                <span class="help-block">{{ $errors->first('player2') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_2" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_2', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_2', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_2', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_2', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group odd">
                            <label>Игрок #3</label>
                            <div class="">
                                <select name="player3" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player3'))
                                <span class="help-block">{{ $errors->first('player3') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_3" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_3', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_3', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_3', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_3', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group even ">
                            <label>Игрок #4</label>
                            <div class="">
                                <select name="player4" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player4'))
                                <span class="help-block">{{ $errors->first('player4') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_4" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_4', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_4', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_4', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_4', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group odd">
                            <label>Игрок #5</label>
                            <div class="">
                                <select name="player5" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player5'))
                                <span class="help-block">{{ $errors->first('player5') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_5" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_5', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_5', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_5', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_5', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="r">

                        <div class="form-group even">
                            <label>Игрок #6</label>
                            <div class="">
                                <select name="player6" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player6'))
                                <span class="help-block">{{ $errors->first('player6') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_6" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_6', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_6', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_6', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_6', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group odd">
                            <label>Игрок #7</label>
                            <div class="">
                                <select name="player7" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player7'))
                                <span class="help-block">{{ $errors->first('player7') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_7" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_7', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_7', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_7', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_7', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group even">
                            <label>Игрок #8</label>
                            <div class="">
                                <select name="player8" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player8'))
                                <span class="help-block">{{ $errors->first('player8') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_8" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_8', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_8', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_8', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_8', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group odd">
                            <label>Игрок #9</label>
                            <div class="">
                                <select name="player9" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player9'))
                                <span class="help-block">{{ $errors->first('player9') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_9" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_9', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_9', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_9', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_9', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group even">
                            <label>Игрок #10</label>
                            <div class="">
                                <select name="player10" class="chosen-select">
                                    @foreach( $players as $index => $player )
                                        <option value="{{ $player->id }}">{{ $player->name_ru }}/{{ $player->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('player10'))
                                <span class="help-block">{{ $errors->first('player10') }}</span>
                            @endif
                            <div class="">
                                <label>Доп балы</label>
                                <input class="form-control" step="0.01" name="additional_points_10" type="number"
                                       value="0">
                            </div>
                            <div class="form-group colors">
                                <div class="result-choise red">
                                    {{ Form::radio('role_10', 'red', true) }}
                                    <label>Красный</label>
                                </div>
                                <div class="result-choise red">
                                    {{ Form::radio('role_10', 'sheriff') }}
                                    <label>Шериф</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_10', 'black') }}
                                    <label>Черный</label>
                                </div>
                                <div class="result-choise">
                                    {{ Form::radio('role_10', 'don') }}
                                    <label>Дон</label>
                                </div>
                            </div>
                        </div>

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
                    <button type="submit" class="btn btn-yellow margin-top hide">Занести в рейтинг</button>
                </div>
            </form>


        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/chosen/chosen.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/chosen/docsupport/prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('noc_admin/plugins/chosen/docsupport/init.js') }}"></script>
    <script>
        if ($('.chosen-container').length > 0) {
            $('.chosen-container').on('touchstart', function(e){
                e.stopPropagation(); e.preventDefault();
                // Trigger the mousedown event.
                $(this).trigger('mousedown');
            });
        }
        $('input[type="radio"]').click(function () {
            $(".margin-top").removeClass("hide");
        });
    </script>
@endsection
