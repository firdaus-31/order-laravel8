@extends('include._master_pelanggan')
@section('judul','Scan Meja')

@section('isi')
<section class="showcase" onload="timer()">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-lg-12 order-lg-1 my-auto showcase-text">
        <center>
          <img src="{{asset('mgg/mgg/mgg_logo.png')}}" width="20%" alt="">
        </center>
        <div id="reader" width="600px" height="600px"></div>
        <br>
        <form action="{{route('pos_scan_meja')}}" name="form_nomer" id="form1" method="POST">
          {{csrf_field()}}
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <label>Nomer Meja</label>
              <input type="text" name="nomer_meja" id="meja" class="form-control" placeholder="Nomer Meja" required>
            </div>
            <div class="col-md-4"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <center>
                <button type="submit" id="klik" style="display:none;">Masuk</button>
              </center>
            </div>
            <div class="col-md-4"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@section('js_tambahan')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
  function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    // console.log(`Code matched = ${decodedText}`, decodedResult);
    $('#meja').val(decodedText);
  }

  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
      fps: 10,
      qrbox: {
        width: 250,
        height: 250
      }
    },
    /* verbose= */
    false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
<script>
  var tombol = document.getElementById('klik');
  setInterval(function() {
    tombol.click();
  }, 5000);
</script>
@stop
@stop