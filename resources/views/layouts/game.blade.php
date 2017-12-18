@include('admin.include.head')

@yield('page-css')

</head>
<body id="app-layout">

  <section class="game">
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
  <script type="text/javascript" src="{{ asset('noc_admin/js/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('noc_admin/js/main.js') }}"></script>
  @yield('page-js')
</body>
</html>
