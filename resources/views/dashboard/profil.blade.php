@extends('include.master_dash')
@section('judul','Profil')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Profil {{Auth::user()->name}}</h4>
          </div>
          <div class="card-body">
            <center>
              <img src="{{asset('foto_pegawai/'.$pegawai->foto)}}" style="width:150px;height:150px;" alt="Foto Pegawai MGG" id="blah">
            </center>
            <hr>
            <table class="table table-striped">
              <tr>
                <td>Nama</td>
                <td>{{$pegawai->nama_pegawai}}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>{{ date('d-m-Y',strtotime($pegawai->tanggal_lahir)) }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{$pegawai->alamat}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$pegawai->email}} <i class="fa fa-key"></i></td>
              </tr>
            </table>
            <hr>
            <a href="{{ route('setting_password',Auth::user()->id) }}" class="btn btn-warning"><i class="fa fa-key"></i> Ganti Password</a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Profil</h4>
          </div>
          <div class="card-body">
            <form action="{{route('update_profil')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_pegawai" value="{{$pegawai->id_pegawai}}">
              <div class="form-group">
                <label for="nama" class="itam">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$pegawai->nama_pegawai}}">
              </div>
              <div class="form-group">
                <label for="tanggal_lahir" class="itam">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ date('Y-m-d',strtotime($pegawai->tanggal_lahir)) }}">
              </div>
              <div class="form-group">
                <label for="email" class="itam">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $pegawai->email }}" id="email">
                <small style="color: red;">*Jika anda melakukan perubahan data email sistem akan melakukan logout secara otomatis</small>
              </div>
              <div class="form-group">
                <label for="alamat" class="itam">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3">{{$pegawai->alamat}}</textarea>
              </div>
              <div class="form-group">
                <label for="foto" class="itam">Foto</label>
                <input type="file" name="foto" class="form-control" id="imgInp">
              </div>
              <hr>
              <div class="form-group" align="right">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                <a href="" class="btn btn-danger"><i class="fa fa-home"></i> Kembali Ke Home</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection