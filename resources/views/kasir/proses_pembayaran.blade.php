@extends('include.kasir_dash')
@section('judul','Proses Pembayaran')
@section('content')
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1 col-sm-12">
      </div>
      <div class="col-lg-10 col-sm-12">
        <div class="card garis">
          <div class="stat-widget card-body">
            <div class="stat-content itam">
              <center>
                <h1>Proses Pembayaran Kasir</h1>
              </center>
              <hr style="border:2px solid black;">
              <form action="{{ route('input_pembayaran',$meja->kode_pembayaran) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="meja">Nomor Meja</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="meja" name="meja" value="{{$meja->nomor_meja}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="pelanggan">Nama Pelanggan</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="pelanggan" name="nama_pelanggan" value="{{$meja->pelanggan}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="kode_pembayaran">Kode Pembayaran</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="pembayaran" name="kode_pembayaran" value="{{$meja->kode_pembayaran}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="total">Total Harga</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="total" value="{{number_format($jumlah)}}" readonly>
                    <input type="hidden" id="harga" name="total_harga" onchange="total_kembalian()" value="{{$jumlah}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="diterima">Uang Diterima</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" onchange="total_kembalian()" id="diterima" name="uang_diterima" placeholder="Jumlah Uang Diterima Kasir" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3" style="margin-top:5px;">
                    <label for="kembalian">Kembalian</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="kembalian" name="uang_kembalian" value="0" placeholder="Uang Kembalian" readonly>
                  </div>
                </div>
                <hr style="border:2px solid black;">
                <div class="form-group row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-block">Simpan Pembayaran</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-sm-12">
      </div>
    </div>
  </div>
</div>
@section('tambahan')
<script>
  function total_kembalian() {
    var harga = document.getElementById('harga').value;
    var terima = document.getElementById('diterima').value;
    var grand_total = terima - harga;
    document.getElementById('kembalian').value = grand_total;
  }
</script>
@endsection
@endsection