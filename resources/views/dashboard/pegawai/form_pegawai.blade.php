@extends('include.master_dash')
@section('judul','Form Input Pegawai')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <center>
              <h1>Form Input Pegawai</h1>
            </center>
            <hr>
            <form action="{{route('proses_pegawai')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="nama_pegawai" class="itam">Nama Pegawai</label>
                  <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="email_pegawai" class="itam">Email Pegawai</label>
                  <input type="email" name="email_pegawai" class="form-control" id="email_pegawai" placeholder="Email Pegawai">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="alamat" class="itam">Alamat</label>
                  <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Alamat Pegawai"></textarea>
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="tanggal_lahir" class="itam">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="akses" class="itam">Akses Akun</label>
                  <br>
                  <input type="radio" name="akses" value="1" id="admin"> <label for="admin" class="itam"> Admin </label> 
                  <input type="radio" name="akses" value="2" id="admin"> <label for="dapur" class="itam"> Dapur </label> 
                  <input type="radio" name="akses" value="3" id="kasir"> <label for="kasir" class="itam"> Kasir </label>
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="foto" class="itam">Foto Pegawai</label>
                  <br>
                  <input type="file" name="foto_pegawai" id="imgInp">
                  <br>
                  <center>
                    <img src="" width="50%" id="blah">
                  </center>
                </div>
                <div class="col-md-2"></div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8" align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i> Simpan</button>
                  <a href="{{route('pegawai')}}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                </div>
                <div class="col-md-2"></div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop