@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>All items</h1>
        <p>You can manage your items here</p>
      </div>
      <div class="r"><a href="{{url('/admin/create-item')}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$items->count() )
      <div class="empty">
        <p>There are no items. Use green button to create new item.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Title</div>
        <div class="cell date">Short Desc</div>
        <div class="cell image">Image</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $items as $index => $item )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $item->id }} </div>
          <div class="cell">{{ $item->title }}</div>
          <div class="cell date">{{ $item->short_desc }}</div>
          <div class="cell image">
            @if ( $item->img_path )
              <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$item->img_path}}"/>
            @endif
          </div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-item/'.$item->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-item/'.$item->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $items->render() !!}   
      </div> 
    @endif
  </div>
@endsection
