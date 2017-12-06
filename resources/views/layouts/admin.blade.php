@include('admin.include.head')

@yield('page-css')

</head>
<body id="app-layout">

  @include('admin.include.header')
    
  <section>
    @include('admin.include.sidebar')
    @yield('content')    
  </section>

  @if (Session::has('message'))
    <div class="alert green">
      <p>
        {{ Session::get('message') }}
      </p>
      <a href="#" class="alert-close"></a>
    </div>
  @endif
  @if ($errors->any())
    <div class="alert red">
      <p>
        @foreach ( $errors->all() as $error )
          {{ $error }}
        @endforeach
      </p>
      <a href="#" class="alert-close"></a>
    </div>
  @endif 
  
  @include('admin.include.footer')
    
  @yield('page-js')
</body>
</html>
