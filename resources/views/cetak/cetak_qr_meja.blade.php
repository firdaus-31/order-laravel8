<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qr Code Meja</title>
  <link rel="stylesheet" href="{{ asset('template/focus/vendor/owl-carousel/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{asset('template/focus')}}vendor/owl-carousel/css/owl.theme.default.min.css">
  <link href="{{asset('template/focus/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
  <style>
    .kotak {
      width: 200px;
      height: 190px;
      background-color: #f5f5f5;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 1px;
      margin: 5px;
    }

    body {
      width: 100%;
      margin: 0;
    }

    .label {
      margin: 10px;
      padding-top: 10px;

      width: 180px;
      height: 100%;
      float: left;
      text-align: center;
      overflow: hidden;
    }

    .page-break {
      clear: left;
      display: block;
      page-break-after: always;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="row label kotak">
          <div class="col-md-3">
            <center>
              {!! QrCode::size(110)->generate($meja->nomor_meja) !!}
              <h6>{{$meja->nomor_meja}} <br>
                Kunjungi Situs <br> e-order.mgg.com</h6>
            </center>
          </div>
        </div>
        <div class="page-break"></div>
      </div>
    </div>
  </div>
  <script src="{{asset('template/focus/vendor/global/global.min.js')}}"></script>
  <script src="{{asset('template/focus/js/quixnav-init.js')}}"></script>
  <script src="{{asset('template/focus/js/custom.min.js')}}"></script>
  <script>
    window.print();
  </script>
</body>

</html>