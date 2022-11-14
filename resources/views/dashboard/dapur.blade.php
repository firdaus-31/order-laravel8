@extends('include.master_dash')
@section('judul','Data Dapur')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Dapur</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add_dapur')}}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nomer</th>
                                        <th>Nomor Meja</th>
                                        <th>Nama Kepala Koki</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dapur as $n => $d)
                                    <tr>
                                        <td>{{++$n}}</td>
                                        <td>{{$d->nama_dapur}}</td>
                                        @foreach($pegawai->where('id_pegawai',$d->kepala_koki) as $pg)
                                        <td>{{$pg->nama_pegawai}}</td>
                                        @endforeach
                                        <td>
                                            <center>
                                                <a href="{{route('edit_meja',$d->id_dapur)}}" class="btn btn-warning">Edit</a>
                                                <a href="{{route('hapus_meja',$d->id_dapur)}}" class="btn btn-danger">Hapus</a>
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