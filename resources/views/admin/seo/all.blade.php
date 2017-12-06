@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>@lang('admin.all_seo')</h1>
        <p>@lang('admin.manage_seo')</p>
      </div>
      <div class="r">
        <a href="{{url('/admin/create-seo')}}" class="btn btn-small btn-green">CREATE</a>
      </div>
    </div>
    @if ( !$seo->count() )
      <div class="empty">
        <p>There are no SEO records. Use green button to create new SEO records.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Route</div>
        <div class="cell date">Locale</div>
        <div class="cell actions">ACTIONS</div>
      </div> 
      @foreach( $seo as $index => $seo1 )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $seo1->id }} </div>
          <div class="cell">{{ $seo1->route }}</div>
          <div class="cell date">{{ $seo1->locale }}</div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-seo/'.$seo1->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-seo/'.$seo1->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $seo->render() !!}   
      </div> 
    @endif
  </div>
@endsection
