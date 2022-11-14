<html>

<head>
  <title>Laporan Orderan Selesai</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <center>
      <h2>Laporan Orderan Selesai</h2>
      <h5>Periode : {{ date('d-m-Y',strtotime($mulai)) }} .Sd. {{ date('d-m-Y',strtotime($akhir)) }}</h5>
    </center>
    <br />
    <table class='table table-bordered'>
      <thead>
        <tr>
          <th>
            <center>No</center>
          </th>
          <th>
            <center>Waktu</center>
          </th>
          <th>
            <center>Menu</center>
          </th>
          <th>
            <center>Jumlah</center>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($menu as $mn)
        @php
        $order = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','2')->where('tanggal',$mn->tanggal)->sum('jumlah');
        $proses = App\Models\Orderan::where('id_menu',$mn->id_menu)->where('status_pesanan','2')->first();
        $total[] = $order;
        @endphp
        <tr>
          <td class="itam">{{$loop->iteration}}</td>
          <td class="itam">
            <center>{{ date('d-m-Y',strtotime($mn->tanggal)) }}</center>
          </td>
          <td class="itam">{{$mn->menu->nama_menu}}</td>
          <td class="itam">
            <center>{{ $order }}</center>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="3">
            <center>Total</center>
          </td>
          <td>
            <center>{{ @array_sum($total) }}</center>
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