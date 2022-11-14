@extends('include.kasir_dash')
@section('judul','Halaman Dashboard')
@section('content')
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      @foreach($meja as $m)
      <div class="col-lg-4 col-sm-6">
        <div class="card garis">
          <div class="stat-widget-two card-body">
            <div class="stat-content">
              <center>
                <img src="{{asset('mgg/mgg/meja.png')}}" width="100%" alt="gambar meja" title="Meja pelanggan MGG">
              </center>
              <div class="stat-text">{{ $m->nomor_meja }}</div>
              <div class="stat-digit">{!! QrCode::size(100)->generate($m->nomor_meja) !!}</div>
              <hr>
              @if($m->status_meja == 0)
              <table width="100%" berder="1">
                <tr>
                  <td>
                    <center>Kosong</center>
                  </td>
                </tr>
              </table>
              @else
              <table width="100%" berder="1">
                <tr>
                  <td>
                    Status
                  </td>
                  <td style="width:20px;">
                    <center>:</center>
                  </td>
                  <td align="right">Terisi</td>
                </tr>
                <tr>
                  <td>
                    Pelanggan
                  </td>
                  <td style="width:20px;">
                    <center>:</center>
                  </td>
                  <td align="right">{{ $m->pelanggan }}</td>
                </tr>
                <tr>
                  <td>
                    Transaksi
                  </td>
                  <td style="width:20px;">
                    <center>:</center>
                  </td>
                  <td align="right">{{ $m->kode_pembayaran }}</td>
                </tr>
              </table>
              <hr style="border:2px solid black;">
              <a href="{{ route('tampilkan_pesanan_pelanggan',[$m->id_meja,$m->nomor_meja]) }}" class="btn btn-success">Pesanan Pelanggan</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection