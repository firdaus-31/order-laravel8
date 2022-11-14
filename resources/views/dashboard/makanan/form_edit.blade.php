@extends('include.master_dash')
@section('judul','Form Edit Data')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if($data->jenis == 1)
            <center>
              <h1>Form Input Menu Makanan</h1>
            </center>
            @else
            <center>
              <h1>Form Input Menu Minuman</h1>
            </center>
            @endif
            <hr>
            <form action="{{route('proses_edit_menu',$data->id_menu)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="jenis" value="{{$data->jenis}}">
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="nama_menu" class="itam">Nama Menu</label>
                  <input type="text" value="{{$data->nama_menu}}" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="harga" class="itam">Harga</label>
                  <input type="text" name="harga" value="{{$data->harga}}" class="form-control" id="harga" placeholder="Harga">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="dapur" class="itam">Dapur</label>
                  <select class="form-control" name="id_dapur"id="single-select">
                    @foreach($dapur->where('id_dapur',$data->id_dapur) as $d)
                    <option value="{{$d->id_dapur}}">{{$d->nama_dapur}}</option>
                    @endforeach
                    <option>Pilih Kepala Dapur</option>
                    @foreach($dapur as $dp)
                    <option value="{{$dp->id_dapur}}">{{$dp->nama_dapur}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="foto" class="itam">Foto Makanan</label>
                  <input type="file" name="foto_makanan" id="imgInp">
                  <br>
                  <center>
                    <img src="{{asset('foto_makanan/'.$data->foto_menu)}}" width="50%" id="blah">
                  </center>
                </div>
                <div class="col-md-2"></div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8" align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i> Simpan</button>
                  <a href="" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
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