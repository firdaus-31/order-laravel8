<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MGG E-ORDER | @yield('judul')</title>

  <link rel="shortcut icon" href="{{asset('mgg/mgg/mgg_logo.png')}}">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('mgg/bs/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('mgg/bs/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mgg/bs/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('mgg/bs/css/landing-page.min.css') }}" rel="stylesheet">

  <style>
    .wabutton {
      width: 180px;
      height: 50px;
      position: fixed;
      bottom: 50px;
      right: 20px;
      z-index: 100;
    }

    .wabutton-2 {
      width: 100px;
      height: 50px;
      position: fixed;
      bottom: 50px;
      right: 20px;
      z-index: 100;
    }
  </style>

</head>

<body>

  <!-- Navigation -->
  @include('include._head_pelanggan')
  <!-- Icons Grid -->
  @yield('isi')
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Melati Green Garden Pekanbaru</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('mgg/bs/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('mgg/bs/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @yield('js_tambahan')

</body>

</html>