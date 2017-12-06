<div class="page-sidebar">
    <ul>
        <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i> @lang('admin.main')</a></li>
        @if(!Auth::guest() && Auth::user()->is_admin())
            <li><a href="{{url('/admin/category')}}"><i class="fa fa-clone"></i> Categories</a></li>
            <li><a href="{{url('/admin/item')}}"><i class="fa fa-clone"></i> Items</a></li>
            <li><a href="{{url('/admin/news')}}"><i class="fa fa-clone"></i> News</a></li>
            <li><a href="{{url('/admin/properties')}}"><i class="fa fa-pencil-square-o"></i> Properties</a></li>

            <li><a href="{{url('/admin/seo')}}"><i class="fa fa-line-chart"></i> @lang('admin.seo')</a></li>
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-user"></i> @lang('admin.users')</a></li>
        @endif  
        @if(!Auth::guest())
            <li><a href="{{url('/logout')}}" class="minor"><i class="fa fa-sign-out"></i> @lang('admin.exit')</a></li>
        @endif          
    </ul>

</div>