@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>@lang('admin.all_news')</h1>
        <p>@lang('admin.manage_news')</p>
      </div>
      <div class="r"><a href="{{url('/admin/create-news')}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$news->count() )
      <div class="empty">
        <p>There are no news. Use green button to create new news.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Title</div>
        <div class="cell date">Date</div>
        <div class="cell image">Image</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $news as $index => $single_news )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $single_news->id }} </div>
          <div class="cell">{{ $single_news->title }}</div>
          <div class="cell date">{{ $single_news->date }}</div>
          <div class="cell image">
            @if ( $single_news->img_path )
              <img src="{{url('/')}}{{Config::get('noccms.img_path')}}{{$single_news->img_path}}"/>
            @endif
          </div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-news/'.$single_news->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-news/'.$single_news->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $news->render() !!}   
      </div> 
    @endif
  </div>
@endsection
