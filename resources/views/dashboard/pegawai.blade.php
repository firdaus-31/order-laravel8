@extends('include.master_dash')
@section('judul','Data Pegawai')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tabel Data Pegawai</h4>
          </div>
          <div class="card-body">
            <a href="{{route('add_pegawai')}}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Pegawai</a>
            <hr>
            <div class="table-responsive">
              <table id="example" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>Nomer</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th style="width: 150px">Alamat</th>
                    <th style="width: 100px">Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Akses Akun</th>
                    <th style="width: 300px">Proses</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pegawai as $n => $p)
                  <tr>
                    <td>{{++$n}}</td>
                    <td>{{$p->nama_pegawai}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>{{ date('d-m-Y',strtotime($p->tanggal_lahir)) }}</td>
                    <td>
                      <center>
                        <img src="{{asset('foto_pegawai/'.$p->foto)}}" width="100px" height="100px">
                      </center>
                    </td>
                    @foreach($user->where('username',$p->email) as $u)
                    @if($u->akses == 1)
                    <td>Admin</td>
                    @elseif($u->akses == 2)
                    <td>Dapur</td>
                    @else
                    <td>Kasir</td>
                    @endif
                    @endforeach
                    <td>
                      <center>
                        <a href="{{route('edit_pegawai',$p->id_pegawai)}}" class="btn btn-warning jarak"><i class="fa fa-pencil"></i>Edit</a>
                        <a href="{{route('hapus_pegawai',$p->id_pegawai)}}" class="btn btn-danger jarak"><i class="fa fa-trash"></i>Hapus</a>
                        <a href="{{route('reset_password',$p->id_pegawai)}}" class="btn btn-info jarak"><i class="fa fa-rotate-right"></i> Reset</a>
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