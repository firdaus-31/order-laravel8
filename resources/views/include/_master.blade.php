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

</head>

<body>

  <!-- Navigation -->
  @include('include._head')
  <!-- Icons Grid -->
  @yield('isi')
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Melati Green Garden Pekanbaru</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('mgg/bs/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('mgg/bs/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('geo/js/geo-min.js')}}" type="text/javascript" charset="utf-8"></script>
  <script>
    if (geo_position_js.init()) {
      geo_position_js.getCurrentPosition(success_callback, error_callback, {
        enableHighAccuracy: true
      });
    } else {
      div_isi = document.getElementById("div_isi");
      div_isi.innerHTML = "Tidak ada fungsi geolocation";
    }

    function success_callback(p) {
      $('#la').val(p.coords.latitude);
      $('#lo').val(p.coords.longitude);
      $('#ac').val(p.coords.accuracy);
    }

    function error_callback(p) {
      div_isi = document.getElementById("div_isi");
      div_isi.innerHTML = 'error = ' + p.message;
    }
  </script>
</body>

</html>
