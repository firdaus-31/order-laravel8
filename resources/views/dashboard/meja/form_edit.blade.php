@extends('include.master_dash')
@section('judul','Edit Data Meja')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <center>
              <h1>Form Edit Meja</h1>
            </center>
            <hr>
            <form action="{{route('proses_edit_meja',$data->id_meja)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <label for="nomor_meja" class="itam">Nomor Meja</label>
                  <input type="text" value="{{$data->nomor_meja}}" name="nomor_meja" class="form-control" id="nomor_meja" placeholder="Nomor Meja">
                </div>
                <div class="col-md-2"></div>
              </div>
              <hr>
              <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-8" align="right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o"></i> Simpan</button>
                  <a href="{{route('meja')}}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
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