@extends('include._master_pelanggan')
@section('judul','Scan Meja')

@section('isi')
<section class="showcase" onload="timer()">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-lg-12 order-lg-1 my-auto showcase-text">
        <center>
          <img src="{{asset('mgg/mgg/mgg_logo.png')}}" width="20%" alt="">
        </center>
        <br>
        <h2>Maaf anda berada diluar jangkauan sistem!</h2>
        <a href="{{route('index')}}" class="btn btn-success btn-block">Kembali</a>
      </div>
    </div>
  </div>
</section>
@stop