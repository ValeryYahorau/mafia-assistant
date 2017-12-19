<div class="page-sidebar">
    <ul>
        @if(Auth::guest() || !Auth::user()->is_admin())
            <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i> @lang('admin.main')</a></li>
        @endif
        @if(!Auth::guest() && Auth::user()->is_admin())
            <li class="system">Ассистент мафии:</li>
            <li><a href="{{url('/admin/games')}}"><i class="fa fa-gamepad" aria-hidden="true"></i> Игры</a></li>
            <!--
            <li><a href="{{url('/admin/tournaments')}}"><i class="fa fa-futbol-o" aria-hidden="true"></i> Турниры</a></li>
            -->
            <li><a href="{{url('/admin/players')}}"><i class="fa fa-users" aria-hidden="true"></i> Игроки</a></li>
            <li class="system">Управление системой:</li>
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-user"></i> @lang('admin.users')</a></li>
        @endif  
        @if(!Auth::guest())
            <li><a href="{{url('/logout')}}" class="minor"><i class="fa fa-sign-out"></i> @lang('admin.exit')</a></li>
        @endif          
    </ul>

</div>