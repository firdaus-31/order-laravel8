@extends('include.master_dash')
@section('judul','Form Input Data')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if($jenis_menu == 1)
            <center>
              <h1>Form Input Menu Makanan</h1>
            </center>
            @else
            <center>
              <h1>Form Input Menu Minuman</h1>
            </center>
            @endif
            <hr>
            <form action="{{route('proses_menu')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="jenis" value="{{$jenis_menu}}">
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="nama_menu" class="itam">Nama Menu</label>
                  <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="harga" class="itam">Harga</label>
                  <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="dapur" class="itam">Dapur</label>
                  <select class="form-control" name="id_dapur" id="single-select">
                    <option>Pilih Dapur</option>
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
                  @if($jenis_menu == 1)
                  <label for="foto" class="itam">Foto Makanan</label>
                  @else
                  <label for="foto" class="itam">Foto Minuman</label>
                  @endif
                  <input type="file" name="foto_makanan" id="imgInp">
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
                  @if($jenis_menu == 1)
                  <a href="{{route('menu_makanan')}}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                  @else
                  <a href="{{route('menu_minuman')}}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                  @endif
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