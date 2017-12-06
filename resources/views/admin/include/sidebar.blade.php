<div class="page-sidebar">
    <ul>
        <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i> @lang('admin.main')</a></li>
        @if(!Auth::guest() && Auth::user()->is_admin())
            <li><a href="{{url('/admin/events')}}"><i class="fa fa-calendar"></i> @lang('admin.events')</a></li>
            <li><a href="{{url('/admin/photoreports')}}"><i class="fa fa-picture-o"></i> @lang('admin.photoreports')</a></li>
            <li><a href="{{url('/admin/news')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.news')</a></li>
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-user"></i> @lang('admin.users')</a></li>
        @endif  
        @if(!Auth::guest())
            <li><a href="{{url('/logout')}}" class="minor"><i class="fa fa-sign-out"></i> @lang('admin.exit')</a></li>
        @endif          
    </ul>

</div>