<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>MGG | @yield('judul')</title>
  <!-- Favicon icon -->
  <link rel="shortcut icon" href="{{asset('mgg/mgg/mgg_logo.png')}}">
  <link rel="stylesheet" href="{{ asset('template/focus/vendor/owl-carousel/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{asset('template/focus')}}vendor/owl-carousel/css/owl.theme.default.min.css">
  <link href="{{asset('template/focus/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/focus/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{asset ('template/focus/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/focus/css/style.css')}}" rel="stylesheet">
  <style>
    .itam {
      color: black;
      font-size: 15px;
    }

    td {
      color: black;
      font-size: 15px;
    }

    .jarak {
      margin: 5px;
    }

    .garis {
      border: 2px solid #8782826e;
      border-radius: 5px;
      margin-left: 50px;
      margin-bottom: 50px;
    }
  </style>
</head>

<body>
  <div id="preloader">
    <div class="sk-three-bounce">
      <div class="sk-child sk-bounce1"></div>
      <div class="sk-child sk-bounce2"></div>
      <div class="sk-child sk-bounce3"></div>
    </div>
  </div>
  <div id="main-wrapper">
    <div class="nav-header">
      <a href="index.html" class="brand-logo">
        E-ORDER MGG
      </a>

      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    @include('include.menu_kasir')
    @yield('content')
    <div class="footer">
      <div class="copyright">
        <p>E-Order Melati Green Garden 2022</p>
      </div>
    </div>

  </div>
  <!-- Required vendors -->
  <script src="{{asset('template/focus/vendor/global/global.min.js')}}"></script>
  <script src="{{asset('template/focus/js/quixnav-init.js')}}"></script>
  <script src="{{asset('template/focus/js/custom.min.js')}}"></script>


  <!-- Vectormap -->
  <script src="{{asset('template/focus/vendor/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('template/focus/vendor/morris/morris.min.js')}}"></script>


  <script src="{{asset('template/focus/vendor/circle-progress/circle-progress.min.js')}}"></script>
  <script src="{{asset('template/focus/vendor/chart.js/Chart.bundle.min.js')}}"></script>

  <script src="{{asset('template/focus/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

  <!--  flot-chart js -->
  <script src="{{asset('template/focus/vendor/flot/jquery.flot.js')}}"></script>
  <script src="{{asset('template/focus/vendor/flot/jquery.flot.resize.js')}}"></script>

  <!-- Owl Carousel -->
  <script src="{{asset('template/focus/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

  <!-- Counter Up -->
  <script src="{{asset('template/focus/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>

  <script src="{{ asset('template/focus/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('template/focus/js/plugins-init/datatables.init.js')}}"></script>
  <script src="{{asset('template/focus/js/dashboard/dashboard-1.js')}}"></script>
  <script src="{{asset('template/focus/vendor/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('template/focus/js/plugins-init/select2-init.js')}}"></script>
  @yield('tambahan')
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          jQuery('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>

</body>

</html>