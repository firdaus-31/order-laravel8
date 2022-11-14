@extends('include._master_pelanggan')
@section('judul','Input Pelanggan')

@section('isi')
<section class="showcase">
  <div class="container">
    <br>
    <a href="{{route('menu',$nomor_meja)}}" class="btn btn-danger">Kembali</a>
    <hr>
    <p class="sebelum"><u><strong>Konfirmasi Menu Anda</strong></u> :</p>
    <br>
    <div id="cetak">
      <table class="table table-hover" width="100%">
        <tr>
          <td>Kode Pesanan</td>
          <td>Konsumen</td>
          <td>Menu</td>
          <td>QTY</td>
          <td style="width:200px;">Atur Jumlah</td>
        </tr>
        @foreach($pesanan as $n => $p)
        @php
        $total[] = $p->jumlah * $p->menu->harga;
        @endphp
        <tr>
          <td>{{$p->urutan_pesanan}}</td>
          <td>{{$p->nama_konsumen}}</td>
          <td>{{$p->menu->nama_menu}}</td>
          @if ($p->status_menu == 0)
          <td>{{$p->jumlah}}</td>
          <td>
            <a href="{{route('ubah_jumlah',[$p->id_pesanan,$nomor_meja])}}" class="btn btn-info">Ubah Jumlah</a>
            <a href="{{route('batal_pesan',[$p->id_pesanan,$nomor_meja])}}" class="btn btn-danger">Batal Pesan</a>
          </td>
          @elseif($p->status_menu == 1)
          <td>{{$p->jumlah}}X{{number_format($p->menu->harga)}}</td>
          <td>Rp. {{number_format($p->jumlah * $p->menu->harga)}}</td>
          @php
          $itung = $p->jumlah * $p->menu->harga;
          $sub_total[] = $itung;
          @endphp
          @endif
        </tr>
        @if($p->urutan_pesanan == NULL)
        <form action="{{route('konfirmasi_pesanan',$nomor_meja)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="kode_pembayaran" value="{{$p->kode_pembayaran}}">
          <button type="submit" class="btn btn-success wabutton-2">Kirimkan</button>
        </form>
        @else
        @endif
        @endforeach
        <tr>
          <td colspan="4">Total Belanja</td>
          @if(!isset($sub_total))
          <td>Rp. 0</td>
          @else
          <td>Rp. {{number_format(array_sum($sub_total))}}</td>
          @endif
        </tr>
      </table>
    </div>
    <hr>
    <p><i>*Pesanan belum terkirim, jika anda sudah setuju dengan pesanan anda, silakan klik tombol "<strong>Kirimkan</strong>"</i></p>
    <p><i>*Jika ingin menambah pesanan klik tombol "<strong>Pesan Lagi</strong>"</i></p>
    <p>Fitur cetak bill belum support dengan android browser</p>
    <div class="row">
      <div class="col-md-12">
        <center>
          <a href="{{route('menu',$nomor_meja)}}" class="btn btn-info">Pesan lagi</a>
          <button onclick="printCertificate()" class="btn btn-success"><i class="fa fa-print"></i> Cetak Bill</button>
        </center>
      </div>
    </div>
  </div>
</section>
@section('tambahan')
<script>
  function printCertificate() {
    const printContents = document.getElementById('cetak').innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
@endsection
@stop