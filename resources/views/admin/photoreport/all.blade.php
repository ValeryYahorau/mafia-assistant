@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>@lang('admin.all_photoreports')</h1>
        <p>@lang('admin.manage_photoreports')</p>
      </div>
      <div class="r"><a href="{{url('/admin/create-photoreport')}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$photoreports->count() )
      <div class="empty">
        <p>There are no photoreports. Use green button to create new photoreport.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Title</div>
        <div class="cell date">Date</div>
        <div class="cell image">Image</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $photoreports as $index => $photoreport )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $photoreport->id }} </div>
          <div class="cell">{{ $photoreport->title_ru }}<br/>{{ $photoreport->title_en }}</div>
          <div class="cell date">{{ $photoreport->date }}</div>
          <div class="cell image">
            @if ( $photoreport->img_path )
              <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$photoreport->img_path}}"/>
            @endif
          </div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-photoreport/'.$photoreport->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-photoreport/'.$photoreport->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $photoreports->render() !!}   
      </div> 
    @endif
  </div>
@endsection
