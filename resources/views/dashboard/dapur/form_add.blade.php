@extends('include.master_dash')
@section('judul','Form Input Data')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <center>
              <h1>Form Input Menu Dapur</h1>
            </center>
            <hr>
            <form action="{{route('proses_dapur')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="nama_menu" class="itam">Nama Dapur</label>
                  <input type="text" name="nama_dapur" class="form-control" id="nama_menu" placeholder="Nama Menu">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="kepala_koki" class="itam">Kepala Koki</label>
                  <select class="form-control" name="kepala_koki"id="single-select">
                    <option>Pilih Kepala Koki</option>
                    @foreach($user as $u)
                    @foreach($pegawai->where('email',$u->username) as $p)
                    <option value="{{$p->id_pegawai}}">{{$p->nama_pegawai}}</option>
                    @endforeach
                    @endforeach
                </select>
                </div>
                <div class="col-md-2"></div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8" align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i> Simpan</button>
                  <a href="{{route('dapur')}}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
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