@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Свойства</h1>
        <p>Здесь вы можете управлять всеми настройками сайта</p>
      </div>
      <!--
      <div class="r"><a href="{{url('/admin/create-property')}}" class="btn btn-small btn-green">CREATE</a></div>
      -->
    </div>
    @if ( !$properties->count() )
      <div class="empty">
        <p>There are no properties. Use green button to create new property.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell">Desciption</div>
        <div class="cell date" style="width: 350px;">Value</div>
        <div class="cell image" style="width: 50px;">Locale</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $properties as $index => $property )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell">{{ $property->description }}</div>
          <div class="cell date" style="width: 350px;">{{ $property->value }}</div>
          <div class="cell image" style="width: 50px;">{{ $property->locale }}
          </div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-property/'.$property->id)}}">EDIT</a>
            <!--
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-property/'.$property->id)}}">DELETE</a>
            -->
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $properties->render() !!}   
      </div> 
    @endif
  </div>
@endsection
