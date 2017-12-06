@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>Categories</h1>
        <p>You can manage your categories here</p>
      </div>
      <div class="r"><a href="{{url('/admin/create-category')}}" class="btn btn-small btn-green">CREATE</a></div>
    </div>
    @if ( !$categories->count() )
      <div class="empty">
        <p>There are no categories. Use green button to create new category.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Title</div>
        <div class="cell">Description</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $categories as $index => $category )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $category->id }} </div>
          <div class="cell">{{ $category->title }}</div>
          <div class="cell">{{ $category->description }}</div>
          <div class="cell actions">
            <a class="btn btn-small btn-yellow" href="{{url('/admin/edit-category/'.$category->id)}}">EDIT</a>
            <a class="btn btn-small btn-red" href="{{url('/admin/delete-category/'.$category->id)}}">DELETE</a>
          </div> 
      </div>
      @endforeach  
      <div class="pages">
      {!! $categories->render() !!}   
      </div> 
    @endif
  </div>
@endsection
