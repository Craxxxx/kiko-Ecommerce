<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KIKOPILI')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('styles')
</head>
  <!-- fonts & other head assets -->
<body>
  {{-- NAVBAR  PARTIAL --}}
  @include('partials.navbar') 


  {{-- PAGE-SPECIFIC CONTENT  --}}
  <main>
    @yield('content')
  </main>

  @include('partials.footer')


  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  // Set the CSRF token for Axios
  axios.defaults.headers.common['X-CSRF-TOKEN'] =
  document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  </script>
  <script src="{{ asset('js/cart.js') }}" defer></script>
  @stack('scripts')
</body>
</html>
