<html>

<head>
  <title>Laporan Transaksi MGG</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <center>
      <h2>Laporan Transaksi MGG</h2>
      <h5>Periode : {{ date('d-m-Y',strtotime($mulai)) }} .Sd. {{ date('d-m-Y',strtotime($selesai)) }}</h5>
    </center>
    <br />
    <table class='table table-bordered'>
      <thead>
        <tr>
          <th>No</th>
          <th>
            <center>Nomor Meja</center>
          </th>
          <th>
            <center>Kode Pembayaran</center>
          </th>
          <th>
            <center>Nama Pelanggan</center>
          </th>
          <th>
            <center>Harga</center>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksi as $n => $t)
        @php
        $sub_total[] = $t->total_harga;
        @endphp
        <tr>
          <td>{{++$n}}</td>
          <td>{{$t->kode_meja}}</td>
          <td>{{$t->kode_pembayaran}}</td>
          <td>{{$t->pelanggan}}</td>
          <td>
            <center>Rp. {{number_format($t->total_harga)}}</center>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="4">
            <center>Total</center>
          </td>
          <td>
            <center>Rp. {{ number_format(@array_sum($sub_total)) }}</center>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

</body>
<script>
  window.print();
</script>

</html>