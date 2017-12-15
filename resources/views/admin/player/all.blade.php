@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Игроки</h1>
      </div>
      <div class="r"><a href="{{url('/admin/create-player')}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$players->count() )
      <div class="empty">
        <p>There are no players. Use green button to create new player.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Name</div>
        <div class="cell date">Real Name</div>
        <div class="cell image">Type</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $players as $index => $player )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $player->id }} </div>
          <div class="cell">{{ $player->name_ru }}<br/>{{ $player->name_en }}</div>
          <div class="cell date">{{ $player->real_name }}</div>
          <div class="cell image">{{ $player->type }}</div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-player/'.$player->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-player/'.$player->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  

    @endif
  </div>
@endsection
