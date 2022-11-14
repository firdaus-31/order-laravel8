@extends('include.master_dash')
@section('judul','Halaman Dashboard')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Menu Makanan </div>
                            <div class="stat-digit"> {{$jumlah_makanan}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Jumlah Minuman</div>
                            <div class="stat-digit"> {{$jumlah_minuman}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Jumlah Meja Pelanggan</div>
                            <div class="stat-digit"> {{$jumlah_meja}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Jumlah Orderan</div>
                            <div class="stat-digit"> {{$jumlah_pesanan}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Lokasi</div>
                            <div class="stat-digit">
                                <form action="{{route('pos_lokasi')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <input type="hidden" class="form-control" name="longitude" id="lo" readonly>
                                        <input type="hidden" class="form-control" name="latitude" id="la" readonly>
                                        <input type="hidden" class="form-control" name="accuracy" id="ac" readonly>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-map-marker"></i> Set Lokasi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <center>
                            <img src="{{asset('mgg/mgg/mgg_menu2.png')}}" width="70%">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('tambahan')
<script src="{{asset('geo/js/geo-min.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    if (geo_position_js.init()) {
        geo_position_js.getCurrentPosition(success_callback, error_callback, {
            enableHighAccuracy: true
        });
    } else {
        div_isi = document.getElementById("div_isi");
        div_isi.innerHTML = "Tidak ada fungsi geolocation";
    }

    function success_callback(p) {
        $('#la').val(p.coords.latitude);
        $('#lo').val(p.coords.longitude);
        $('#ac').val(p.coords.accuracy);
    }

    function error_callback(p) {
        div_isi = document.getElementById("div_isi");
        div_isi.innerHTML = 'error = ' + p.message;
    }
</script>
@endsection
@endsection