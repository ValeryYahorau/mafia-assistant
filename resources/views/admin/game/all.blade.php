@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Игры</h1>
      </div>
      <div class="r">
          <a href="{{url('/admin/create-protocol')}}" class="btn btn-small btn-yellow">ВНЕСТИ ПРОТОКОЛ</a>
          <a href="{{url('/admin/create-game')}}" class="btn btn-small btn-green">СОЗДАТЬ</a>
      </div>
    </div>
    @if ( !$games->count() )
      <div class="empty">
        <p>There are no games. Use green button to create new game.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Date</div>
        <div class="cell date">Owner</div>
        <div class="cell image">Type</div>
        <div class="cell image">Status</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $games as $index => $game )
        <div class="row  entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $game->id }} </div>
          <div class="cell">{{ $game->created_at }}</div>
          <div class="cell date">{{ $game->user->name }}</div>
          <div class="cell image">{{ $game->type }}</div>
          <div class="cell image">{{ $game->status }}</div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/game/'.$game->id)}}">VIEW</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-game/'.$game->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $games->render() !!}
      </div> 
    @endif
  </div>
@endsection
