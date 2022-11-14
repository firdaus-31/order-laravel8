@extends('include._master_pelanggan')
@section('judul','Input Pelanggan')

@section('isi')
<section class="showcase">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-lg-12 order-lg-1 my-auto showcase-text">
        <center>
          <img src="{{asset('mgg/mgg/mgg_logo.png')}}" width="20%" alt="">
        </center>
        <br>
        <form action="{{route('pos_pelanggan')}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="nomor_meja" value="{{$nomer}}">
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <label>Nama Pelanggan</label>
              <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required>
            </div>
            <div class="col-md-4"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <center>
                <button type="submit" class="btn btn-success btn-block">Masuk</button>
              </center>
            </div>
            <div class="col-md-4"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@stop