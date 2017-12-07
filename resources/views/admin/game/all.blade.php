@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>{{$label}} игры</h1>
      </div>
      <div class="r"><a href="{{url('/admin/create-game/'.type)}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$games->count() )
      <div class="empty">
        <p>There are no games. Use green button to create new game.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Title</div>
        <div class="cell date">Date</div>
        <div class="cell image">Image</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $games as $index => $event )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $event->id }} </div>
          <div class="cell">{{ $event->title_ru }}<br/>{{ $event->title_en }}</div>
          <div class="cell date">{{ $event->date }}</div>
          <div class="cell image">
            @if ( $event->img_path )
              <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$event->img_path}}"/>
            @endif
          </div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-event/'.$event->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-event/'.$event->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $games->render() !!}
      </div> 
    @endif
  </div>
@endsection
