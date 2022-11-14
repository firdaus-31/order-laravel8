@extends('include._master_pelanggan')
@section('judul','Input Pelanggan')

@section('isi')
<section class="showcase">
  <div class="container">
    <br>
    <table>
      <tr>
        <td>Nomor Meja</td>
        <td>:</td>
        <td>{{$meja->nomor_meja}}</td>
      </tr>
      <tr>
        <td>Kode Pemesanan</td>
        <td>:</td>
        <td>{{$meja->kode_pembayaran}}</td>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td>{{$meja->pelanggan}}</td>
      </tr>
    </table>
    <br>
    <a href="{{ route('list_order',[$meja->kode_pembayaran,$nomor_meja]) }}" class="btn btn-info">Tampilkan Pesanan</a>
    <br>
    <p class="sebelum"><u><strong>Pilihan Menu Makanan</strong></u> :</p>
    <hr>
    <br>
    <form action="{{route('pesan_menu',$nomor_meja)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row box-menu">
        @foreach($makanan as $mkn)
        <div class="col-md-2 pinggiran">
          <center>
            <img src="{{asset('foto_makanan/'.$mkn->foto_menu)}}" style="width:150px" class="atur-menu" alt="">
          </center>
        </div>
        <div class="col-md-8">
          <div class="judul-menu"><strong>{{$mkn->nama_menu}}</strong></div>
          <hr>
          <div class="harga"><strong>Rp. {{ number_format($mkn->harga) }}</strong></div>
        </div>
        <div class="col-2">
          <div class="form-group row">
            <input type="hidden" name="id_menu[]" value="{{$mkn->id_menu}}">
            <input type="hidden" name="id_dapur[]" value="{{$mkn->id_dapur}}">
            <input type="hidden" name="kode_pembayaran" value="{{$meja->kode_pembayaran}}">
            <input type="hidden" name="nama_konsumen" value="{{$meja->pelanggan}}">
            <div class="col-md-12" style="margin-top: 20px;">
              <input type="number" class="form-control" pattern="0-9" value="" name="jumlah_menu[]" placeholder="0">
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <br>
      <br>
      <p class="sebelum"><u><strong>Pilihan Menu Minuman</strong></u> :</p>
      <hr>
      <br>
      <div class="row box-menu">
        @foreach($minuman as $mnm)
        <div class="col-md-2 pinggiran">
          <center>
            <img src="{{asset('foto_makanan/'.$mnm->foto_menu)}}" style="width:150px" class="atur-menu" alt="">
          </center>
        </div>
        <div class="col-md-8">
          <div class="judul-menu"><strong>{{$mnm->nama_menu}}</strong></div>
          <hr>
          <div class="harga"><strong>Rp. {{number_format($mnm->harga)}}</strong></div>
        </div>
        <div class="col-2">
          <div class="form-group row">
            <input type="hidden" name="id_menu[]" value="{{$mnm->id_menu}}">
            <input type="hidden" name="id_dapur[]" value="{{$mnm->id_dapur}}">
            <div class="col-md-12" style="margin-top: 20px;">
              <input type="number" class="form-control" pattern="0-9" value="" name="jumlah_menu[]" placeholder="0">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success wabutton">Kirim Pesanan</button>
        @endforeach
      </div>
  </div>
  </form>
</section>
@stop