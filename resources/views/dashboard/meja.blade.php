@extends('include.master_dash')
@section('judul','Data Meja Pelanggan')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Meja Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus"></i> Tambah Data</button>
                        <a href="{{ route('cetak_seluruh_qr') }}" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Cetak QrCode Meja Keseluruhan</a>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('tambah_meja')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status_meja" value="0">
                                            <div class="form-group row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <label class="itam">Nomor Meja</label>
                                                    <input type="text" name="nomor_meja" class="form-control" placeholder="Nomor Meja" required>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i> Tambah Data</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nomer</th>
                                        <th>Nomor Meja</th>
                                        <th>Kode Qr</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($meja as $n => $m)
                                    <tr>
                                        <td class="itam">{{++$n}}</td>
                                        <td class="itam">{{$m->nomor_meja}}</td>
                                        <td>
                                            <center>{!! QrCode::size(100)->generate($m->nomor_meja) !!}</center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="{{route('edit_meja',$m->id_meja)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="{{route('hapus_meja',$m->id_meja)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                <a href="{{route('cetak_qr_meja',$m->id_meja)}}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Cetak Qr</a>
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