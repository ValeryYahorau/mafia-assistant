@extends('layouts.game')

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('noc_admin/plugins/chosen/chosen.min.css') }}">
@endsection

@section('content')
    <div class="admin-content top">
        <div class="head">
            <div class="l">
                <h1>Create new event</h1>
                <p>Please use form below to create new event.</p>
            </div>
            <div class="r"></div>
        </div>
        <div class="entity-form">

            <form action="{{ LaravelLocalization::localizeURL('/admin/save-game') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="type" value="{{ $type }}">

                <div class="l">

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                </div>
                <div class="r">

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                </div>


                <div class="form-group buttons">
                    <button type="submit" class="btn btn-yellow">Save</button>
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

    <script type="text/javascript">

    </script>
@endsection
