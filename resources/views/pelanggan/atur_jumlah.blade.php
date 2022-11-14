@extends('include._master_pelanggan')
@section('judul','Ubah Jumlah Pesanan')

@section('isi')
<section class="showcase">
  <div class="container">
    <br>
    <p class="sebelum"><u><strong>Ubah Jumlah Pesanan</strong></u> :</p>
    <div class="row">
      <div class="col-lg-12">
        <form action="{{route('ubah_jumlah_proses',$nomor_meja)}}" method="POST">
          @csrf
          <input type="hidden" name="id_pesanan" value="{{$pesanan->id_pesanan}}">
          <input type="hidden" name="kode_pembayaran" value="{{$pesanan->kode_pembayaran}}">
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <label>Menu</label>
              <input type="text" class="form-control" value="{{$pesanan->menu->nama_menu}}" placeholder="Jumlah Pesanan" readonly>
            </div>
            <div class="col-md-3"></div>
          </div>
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <label>Harga</label>
              <input type="text" class="form-control" value="Rp. {{number_format($pesanan->menu->harga)}}" placeholder="Jumlah Pesanan" readonly>
            </div>
            <div class="col-md-3"></div>
          </div>
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <label>Nama Konsumen</label>
              <input type="text" class="form-control" name="nama_konsumen" value="{{$pesanan->nama_konsumen}}" placeholder="Nama Konsumen" required>
            </div>
            <div class="col-md-3"></div>
          </div>
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <label>Jumlah Pesanan</label>
              <input type="number" class="form-control" name="jumlah" value="{{$pesanan->jumlah}}" placeholder="Jumlah Pesanan" required>
            </div>
            <div class="col-md-3"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <center>
                <button type="submit" class="btn btn-success">Simpan</button>
              </center>
            </div>
            <div class="col-md-3"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@stop