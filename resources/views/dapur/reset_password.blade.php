@extends('include.dapur_dash')
@section('judul','Reset Password')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Password Akun {{Auth::user()->name}}</h4>
          </div>
          <div class="card-body">
            <hr>
            <p class="itam">Jika perubahan password berhasil, maka sistem akan secara otomatis melakukan proses logout. agar anda dapat melakukan proses login ulang</p>
            <hr>
            <form method="POST" action="{{ route('update_password') }}">
              @method('patch')
              @csrf
              <div class="form-group row">
                <label for="current_password" class="col-md-4 col-form-label text-md-right itam">Password Lama</label>

                <div class="col-md-6">
                  <input id="pass1" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                  @error('current_password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right itam">Password Baru</label>

                <div class="col-md-6">
                  <input id="pass2" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right itam">Konfirmasi Password</label>

                <div class="col-md-6">
                  <input id="pass3" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                </div>
                <div class="col-md-6">
                  <input type="checkbox" onclick="myFunction()" id="tampil"> <label for="tampil" class="itam">Tampilkan Password</label>
                </div>
              </div>

              <hr>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-floppy-o"></i> Ubah Password
                  </button>
                  <a href="{{ route('profile') }}" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('tambahan')
<script>
  function myFunction() {
    var x = document.getElementById("pass1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    var y = document.getElementById("pass2");
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
    var z = document.getElementById("pass3");
    if (z.type === "password") {
      z.type = "text";
    } else {
      z.type = "password";
    }
  }
</script>
@endsection
@endsection