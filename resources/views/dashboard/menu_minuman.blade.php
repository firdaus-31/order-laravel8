@extends('include.master_dash')
@section('judul','Menu Minuman')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Minuman</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add_menu',2)}}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Makanan</a>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nomer</th>
                                        <th>Nama Minuman</th>
                                        <th>Harga</th>
                                        <th>Dapur</th>
                                        <th>Gambar</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($minuman as $n => $m)
                                    <tr>
                                        <td class="itam">{{++$n}}</td>
                                        <td class="itam">{{$m->nama_menu}}</td>
                                        <td class="itam">Rp. {{ number_format($m->harga) }}</td>
                                        @foreach($dapur->where('id_dapur',$m->id_dapur) as $dp)
                                        <td class="itam">{{$dp->nama_dapur}}</td>
                                        @endforeach
                                        <td><img src="{{asset('foto_makanan/'.$m->foto_menu)}}" width="100px" height="100px"></td>
                                        <td>
                                            <center>
                                                <a href="{{route('edit_makanan',$m->id_menu)}}" class="btn btn-warning">Edit</a>
                                                <a href="{{route('hapus_minuman',$m->id_menu)}}" class="btn btn-danger">Hapus</a>
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