@extends('include.dapur_dash')
@section('judul','Laporan')
@section('content')
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Laporan Orderan Selesai</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <p class="itam"><u><strong>Filter Laporan :</strong></u></p>
              <form action="{{route('filter_laporan')}}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="mulai" class="itam">Mulai Filter</label>
                    @if(!isset($mulai))
                    <input type="date" class="form-control" id="mulai" name="mulai" require>
                    @else
                    <input type="date" class="form-control" value="{{$mulai}}" id="mulai" name="mulai" require>
                    @endif
                  </div>
                  <div class="col-md-4">
                    <label for="akhir" class="itam">Akhir Filter</label>
                    @if(!isset($akhir))
                    <input type="date" class="form-control" id="akhir" name="akhir" require>
                    @else
                    <input type="date" class="form-control" value="{{$akhir}}" id="akhir" name="akhir" require>
                    @endif
                  </div>
                  <div class="col-md-4" style="margin-top:25px;">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Tampilkan</button>
                  </div>
                </div>
              </form>
              @if(!isset($mulai))
              <hr>
              @else
              <hr>
              <p class="itam"><i>*Fitur cetak dibuat untuk mencetak data yang dimulai dari tanggal mulai filter sampai akhir filter</i></p>
              <form action="{{route('cetak_laporan')}}" method="POST" target="_blank">
                @csrf
                <input type="hidden" name="mulai" value="{{$mulai}}">
                <input type="hidden" class="form-control" value="{{$akhir}}" name="akhir" require>
                <div class="form-group row">
                  <div class="col-md-12" style="margin-top:25px;">
                    <button type="submit" class="btn btn-info btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                  </div>
                </div>
              </form>
              <hr>
              @endif
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Waktu</th>
                    <th>Menu</th>
                    <th>Jumlah Order</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($menu as $mn)
                  @if(!isset($mulai))
                  @php
                  $order = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('tanggal',$mn->tanggal)->where('status_pesanan','2')->sum('jumlah');
                  $proses = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','2')->first();
                  @endphp
                  @else
                  @php
                  $order = App\Models\Orderan::whereDate('tanggal','>=',$mulai)->whereDate('tanggal','<=',$akhir)->where('id_menu',$mn->id_menu)->where('status_pesanan','2')->where('tanggal',$mn->tanggal)->sum('jumlah');
                    $proses = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','2')->first();
                    @endphp
                    @endif
                    <tr>
                      <td class="itam">{{$loop->iteration}}</td>
                      <td class="itam">
                        <center>{{ date('d-m-Y',strtotime($mn->tanggal)) }}</center>
                      </td>
                      <td class="itam">{{$mn->menu->nama_menu}}</td>
                      <td class="itam">
                        <center>{{ $order }}</center>
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