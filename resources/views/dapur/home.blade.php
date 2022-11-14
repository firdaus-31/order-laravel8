@extends('include.dapur_dash')
@section('judul','Dashboard Dapur')
@section('content')
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Dashboard {{ $dapur->nama_dapur }}</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Jumlah Order</th>
                    <th>Pesanan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($menu as $mn)
                  @php
                  $order = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','!=','2')->sum('jumlah');
                  $proses = App\Models\Orderan::where('id_menu',$mn->id_menu)->first();
                  $orderan = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','!=','2')->orderBy('urutan_pesanan','ASC')->get();
                  @endphp
                  <tr>
                    <td class="itam">{{$loop->iteration}}</td>
                    <td class="itam">{{$mn->nama_menu}}</td>
                    <td class="itam">
                      <center>{{$order}}</center>
                    </td>
                    <td class="itam">
                      @foreach($orderan as $r)
                      @php
                      $meja = App\Models\ListModel::where('kode_pembayaran',$r->kode_pembayaran)->first();
                      @endphp
                      @if($r->status_pesanan == '0')
                      {{$r->urutan_pesanan}}- Meja : {{$meja->nomor_meja}} - {{$r->nama_konsumen}} - Jumlah : {{$r->jumlah}}  <a href="{{ route('proses_update_pesanan',[$r->id_pesanan,$proses->kode_pembayaran]) }}" class="btn btn-success" style="margin:10px;">Proses Pesanan</a></br>
                      @elseif($r->status_pesanan == '1')
                      {{$r->urutan_pesanan}}- Meja : {{$meja->nomor_meja}} - {{$r->nama_konsumen}} - Jumlah : {{$r->jumlah}}
                        <a href="{{ route('proses_antar_pesanan',[$r->id_pesanan,$proses->kode_pembayaran]) }}" class="btn btn-info" style="margin:10px;">Antar Pesanan</a> <br>
                      @else
                      <p>Belum ada orderan</p>
                      @endif
                      
                      @endforeach
                    </td>
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