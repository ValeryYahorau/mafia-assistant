<!-- spinner 
<div id="loader-wrapper">
	<div class="spinner">
    	<div class="loader-logo"><img src="{{ asset('web/img/logo-spinner.png') }}"></div>
		<div class="atom">
		  <div class="center"></div>
		  <div class="ring"></div>
		  <div class="ring"></div>
		  <div class="ring"></div>
		  <div class="e"></div>
		  <div class="e"></div>
		  <div class="e"></div>
		</div>
	</div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>    --> 
<!-- header -->	
<header class="animatedParent animateOnce">
	<div class="left-top">
		<div class="left-top-background"></div>
	</div>
	<div class="left-top-logo animated fadeInLeftShort delay-500 minslow"><img src="{{ asset('web/img/logo-small.png') }}"></div>
	<nav id="menu" class="menu">
		<button class="menu_handle"><span>Menu</span></button>
		<div class="menu_inner cl-effect-11">
			<ul>
				<li class="animated fadeInDownShort delay-250 minslow"><a class="link" data-hover="@lang('web.home')" href="{{url('/home')}}">@lang('web.home')</a></li>
				<li class="animated fadeInDownShort delay-500 minslow"><a class="link" data-hover="@lang('web.events')" href="{{url('/events')}}">@lang('web.events')</a></li>
				<li class="animated fadeInDownShort delay-750 minslow"><a class="link" data-hover="@lang('web.photoreports')" href="{{url('/photoreports')}}">@lang('web.photoreports')</a></li>
				<li class="animated fadeInDownShort delay-1000 minslow"><a class="link" data-hover="@lang('web.about')" href="{{url('/about')}}">@lang('web.about')</a></li>
				<li class="animated fadeInDownShort delay-1250 minslow"><a class="link" data-hover="@lang('web.news')" href="{{url('/news')}}">@lang('web.news')</a></li>
<!--		
				@if ( LaravelLocalization::getCurrentLocale() == "ru") 
					<li class="animated fadeInDownShort delay-1250 minslow"><a target="_blank" class="link" data-hover="Клевер" href="{{url('/clever')}}">Клевер</a></li>
				@endif-->
				<li class="animated fadeInDownShort delay-1250 minslow"><a class="link" data-hover="@lang('web.contacts')" href="{{url('/contacts')}}">@lang('web.contacts')</a></li>
			</ul>
		</div>
	</nav>
	<div class="right">
		<div class="locale">
			<div class="button button-light" id="ben">
				<a href="{{LaravelLocalization::getLocalizedURL('en') }}" id="en">EN</a>
				<div class="mask"></div>
			</div>							
			<div class="button button-light" id="bru" style="display: block;">
				<a href="{{LaravelLocalization::getLocalizedURL('ru') }}" id="ru">RU</a>
				<div class="mask"></div>
			</div>		
		</div>
	</div>	
</header> 
