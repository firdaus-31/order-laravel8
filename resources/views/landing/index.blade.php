@extends('include._master')
@section('judul','Home')

@section('isi')
<section class="features-icons bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-screen-desktop m-auto text-primary"></i>
          </div>
          <h3>Tampilan Responsif</h3>
          <p class="lead mb-0">Tampilan halaman web pemesanan yang responsive dengan smartphone anda.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-layers m-auto text-primary"></i>
          </div>
          <h3>Pilihan Menu</h3>
          <p class="lead mb-0">Pilihan menu yang banyak dan berbagai macam makan yang siap dinikmati bersama keluarga besar anda.</p>
          <br>
          <!--<center>-->
          <!--  <a href="{{route('scan_meja')}}" class="btn btn-success">Cek Menu</a>-->
          <!--</center>-->
          <form action="{{route('scan_meja')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="longitude" id="lo" readonly>
            <input type="hidden" class="form-control" name="latitude" id="la" readonly>
            <input type="hidden" class="form-control" name="accuracy" id="ac" readonly>
            <button type="submit" class="btn btn-success"><i class="fa fa-list"></i> Cek Menu</button>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-check m-auto text-primary"></i>
          </div>
          <h3>Pelayanan Terbaik</h3>
          <p class="lead mb-0">Memberikan pelayanan terbaik untuk anda, keluarga anda dan rekan bisnis anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
  <div class="container-fluid p-0">
    <div class="row no-gutters">

      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('mgg/mgg/mgg_logo.png') }}');background-size: 60%;background-position: center;background-repeat: no-repeat;"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <h2>Melati Green Garden Pekanbaru</h2>
        <p class="lead mb-0">Melati Green Garden (MGG) pekanbaru, merupakan cave and resto yang cocok untuk akhir pekan anda bersama keluarga, MGG juga cocok dijadikan tempat untuk meeting bersama rekan kerja atau rekan bisnis aman, karena MGG memberikan tempat yang nyaman, memiliki menu yang cukup menarik dan memiliki pramusaji yang profesional.</p>
      </div>
    </div>
  </div>
</section>
@stop