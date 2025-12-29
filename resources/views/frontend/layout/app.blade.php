<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Simple Shop')</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  @yield('style')


</head>
<body>
  
    <!-- topnav -->

    @include('frontend.layout.topnav')


  <main class="py-4">
  
        @yield('content')

  </main>

  <footer class="bg-light py-3">
    <div class="container text-center small">
      &copy; {{ date('Y') }} SimpleShop
    </div>
  </footer>

  <!-- Bootstrap bundle (Popper included) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>


  <script>


  const alert = bootstrap.Alert.getOrCreateInstance('.alert')

  setTimeout(function(){
    alert.close()
  }, 5000)

  


  </script>
  
  @yield('script')



</body>
</html>