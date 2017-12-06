@extends('layouts.admin')

@section('content')
  <div class="admin-content top">
    <div class="head">
      <div class="l">
        <h1>@lang('admin.all_users')</h1>
        <p>@lang('admin.manage_users')</p>
      </div>
      <div class="r"></div>
    </div>
    @if ( !$users->count() )
      <div class="empty">
        <p>There are no users.</p>
      </div> 
    @else
      <div class="row info">
        <div class="cell id">Id</div>
        <div class="cell">Name</div>
        <div class="cell email">Email</div>
        <div class="cell role">Role</div>
        <div class="cell actions">Actions</div>
      </div> 
      @foreach( $users as $index => $user )
        <div class="row entity {{ $index% 2 == 0 ? ' even' : 'odd' }}">
          <div class="cell id">{{ $user->id }} </div>
          <div class="cell">{{ $user->name }}</div>
          <div class="cell email">{{ $user->email }}</div>
          <div class="cell role">{{ $user->role }}</div>
          <div class="cell actions">
            @if (!$user->is_admin())
              <a class="btn btn-small btn-yellow" href="{{url('/admin/approve-user/'.$user->id)}}">APPROVE</a>
            @endif
            @if ( $user->id != Auth::user()->id)
              <a class="btn btn-small btn-red" href="{{url('/admin/delete-user/'.$user->id)}}">DELETE</a>
            @else
              <p>you</p>
            @endif
          </div> 

      </div>
      @endforeach  
      <div class="pages">
      {!! $users->render() !!}   
      </div> 
    @endif
  </div>
@endsection
