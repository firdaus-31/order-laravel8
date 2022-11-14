@extends('include.kasir_dash')
@section('judul','List Menu Pelanggan')
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
              <div id="cetak">
                <center>
                  <h1>Bill Meja Pelanggan</h1>
                </center>
                <hr style="border:2px solid black;">
                <table>
                  <tr>
                    <td>Nomor Meja</td>
                    <td style="width:20px;">
                      <center>:</center>
                    </td>
                    <td>{{$orderan->nomor_meja}}</td>
                  </tr>
                  <tr>
                    <td>Kode Pembayaran</td>
                    <td style="width:20px;">
                      <center>:</center>
                    </td>
                    <td>{{$orderan->kode_pembayaran}}</td>
                  </tr>
                  <tr>
                    <td align="left">Nama Pelanggan</td>
                    <td style="width:20px;">
                      <center>:</center>
                    </td>
                    <td>{{$orderan->pelanggan}}</td>
                  </tr>
                </table>
                <br>
                <table width="100%">
                  <tr style="margin-bottom:10px;border-bottom:1px solid black;">
                    <td>Menu</td>
                    <td>Jumlah & Harga</td>
                    <td>Total</td>
                  </tr>
                  @foreach($pesanan as $o)
                  @php
                  $jumlah_pesanan = \App\Models\Orderan::where('id_menu',$o->id_menu)->where('kode_pembayaran',$o->kode_pembayaran)->where('status_menu','1')->sum('jumlah');
                  $total = $jumlah_pesanan * $o->menu->harga;
                  $sub_total[] = $total;
                  @endphp
                  <tr>
                    <td>{{$o->menu->nama_menu}}</td>
                    <td>{{$jumlah_pesanan}} X {{ number_format($o->menu->harga) }}</td>
                    <td>{{ number_format($total) }}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="2"></td>
                    <td>_______+</td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td>{{number_format(@array_sum($sub_total))}}</td>
                  </tr>
                </table>
              </div>
              <hr style="border:2px solid black;">
              <div class="row">
                @php
                $totalan = array_sum($sub_total);
                @endphp
                <div class="col-md-12">
                  <a href="{{ route('dashboard_kasir') }}" class="btn btn-danger">Kembali</a>
                  <button onclick="printCertificate()" class="btn btn-info"> Cetak Bill Menu</button>
                  <a href="{{ route('proses_pembayaran',[$totalan,$orderan->kode_pembayaran]) }}" class="btn btn-success">Pembayaran</a>
                </div>
              </div>
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
  function printCertificate() {
    const printContents = document.getElementById('cetak').innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
@endsection
@endsection