@extends('include.kasir_dash')
@section('judul','Bill Pembayaran')
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
                  <h1>Bill Pesanan Melati Green Garden</h1>
                </center>
                <hr style="border:2px solid black;">
                <table>
                  <tr>
                    <td>Kode Transaksi</td>
                    <td style="width:20px;">
                      <center>:</center>
                    </td>
                    <td>{{$konfirmasi->kode_pembayaran}}</td>
                  </tr>
                  <tr>
                    <td>Nama Pelanggan</td>
                    <td style="width:20px;">
                      <center>:</center>
                    </td>
                    <td>{{$konfirmasi->pelanggan}}</td>
                  </tr>
                </table>
                <hr>
                <p><strong><u>Item Pesanan</u> :</strong></p>
                <table width="100%">
                  @foreach($pesanan as $ps)
                  @php
                  $jumlah_pesanan = \App\Models\Orderan::where('id_menu',$ps->id_menu)->where('kode_pembayaran',$ps->kode_pembayaran)->where('status_menu','1')->sum('jumlah');
                  $total = $jumlah_pesanan * $ps->menu->harga;
                  $sub_total[] = $total;
                  @endphp
                  <tr>
                    <td>{{$ps->menu->nama_menu}}</td>
                    <td>{{$jumlah_pesanan}} X Rp. {{ number_format($ps->menu->harga) }}</td>
                    <td>Rp. {{ number_format($total) }}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="2"></td>
                    <td>____________+</td>
                  </tr>
                  <tr>
                    <td colspan="2">Sub Total</td>
                    <td>Rp. {{number_format(@array_sum($sub_total))}}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Diterima</td>
                    <td>Rp. {{number_format($konfirmasi->diterima)}}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Kembalian</td>
                    <td>Rp. {{number_format($konfirmasi->kembalian)}}</td>
                  </tr>
                </table>
              </div>
              <hr style="border:2px solid black;">
              <button onclick="printCertificate()" class="btn btn-success btn-block"><i class="fa fa-print"></i> Cetak Bill</button>
              @if($proses == 'pertama')
              <a href="{{ route('dashboard_kasir') }}" class="btn btn-danger btn-block"><i class="fa fa-home"></i> Kembali Ke Home</a>
              @else
              <a href="{{ route('laporan_transaksi') }}" class="btn btn-danger btn-block"><i class="fa fa-home"></i> Kembali Ke Laporan</a>
              @endif
            </div>
          </div>
        </div>
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