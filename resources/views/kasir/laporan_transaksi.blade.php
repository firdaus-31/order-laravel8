@extends('include.kasir_dash')
@section('judul','Laporan Transaksi')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tabel Data Transaksi</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(!isset($mulai))
              <form action="{{ route('filter_transaksi') }}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="mulai" class="itam">Filter Mulai</label>
                    <input type="date" class="form-control" name="mulai" id="mulai" required>
                  </div>
                  <div class="col-md-4">
                    <label for="selesai" class="itam">Filter Selesai</label>
                    <input type="date" class="form-control" name="selesai" id="selesai" required>
                  </div>
                  <div class="col-md-4" style="margin-top:30px;">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Filter Data</button>
                  </div>
                </div>
              </form>
              @else
              <form action="{{ route('filter_transaksi') }}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="mulai" class="itam">Filter Mulai</label>
                    <input type="date" class="form-control" value="{{$mulai}}" name="mulai" id="mulai" required>
                  </div>
                  <div class="col-md-4">
                    <label for="selesai" class="itam">Filter Selesai</label>
                    <input type="date" class="form-control" name="selesai" value="{{$selesai}}" id="selesai" required>
                  </div>
                  <div class="col-md-4" style="margin-top:30px;">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Filter Data</button>
                  </div>
                </div>
              </form>
              <hr>
              <form action="{{ route('cetak_transaksi') }}" target="_blank" method="POST">
                @csrf
                <input type="hidden" class="form-control" value="{{$mulai}}" name="mulai" id="mulai" required>
                <input type="hidden" class="form-control" name="selesai" value="{{$selesai}}" id="selesai" required>
                <div class="form-group row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                  </div>
                </div>
              </form>
              @endif
              <hr>
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Kode Pembayaran</th>
                    <th>Nama Pelanggan</th>
                    <th>Harga</th>
                    <th>Diterima</th>
                    <th>Kembalian</th>
                    <th>Proses</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transaksi as $n => $t)
                  <tr>
                    <td>{{++$n}}</td>
                    <td>{{$t->kode_meja}}</td>
                    <td>{{$t->kode_pembayaran}}</td>
                    <td>{{$t->pelanggan}}</td>
                    <td>Rp. {{number_format($t->total_harga)}}</td>
                    <td>Rp. {{number_format($t->diterima)}}</td>
                    <td>Rp. {{number_format($t->kembalian)}}</td>
                    <td>
                      <center>
                        <a href="{{route('cetak_ulang',$t->kode_pembayaran)}}" class="btn btn-info"><i class="fa fa-print"></i> Cetak Bill</a>
                      </center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection