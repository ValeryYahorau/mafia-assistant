<header>
    <div class="logo">
        <img src="{{ asset('noc_admin/img/logo.png') }}"/>
    </div>
    <div class="title"><p>N.O.C. content management system</p></div>
    <div class="locales">
    	@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        	<a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}" class="hvr-underline-from-center">{{{ $properties['native'] }}}</a>
        @endforeach
    </div>
</header>