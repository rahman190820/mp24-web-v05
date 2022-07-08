<!DOCTYPE html>
<html>
<head>
    <title>Medika 24</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>ini contoh laporannya </p>
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
      </div>
    </div>
    @foreach ($users as $item)
    <table class="table table-bordered">
      <tr>
        <td>
            <h6>Pasien</h6>
           
        </td>
        <td>
            <h6>fasilitas Kesehatan</h6>
        </td>
      </tr>
      <tr>
        <td>
         
         
            <ul>
                <li>Nama Pasien : {{ $item->nama }} </li>
                <li>NIK / Nokartu : {{ $item->nokartu }}</li>
                <li>No. peserta {{ $item->nopeserta}}</li>
                <li>keluhan :  {{ $item->keluhan}}</li>
                <li>Tanggal: {{ $item->tanggal_dibuat  }} </li>
            </ul>
        </td>
        <td>
            <ul>
                <li>Nama dokter : {{ $item->fastenmedis }}</li>
                <li>Terima Keluhan : {{ $item->tgl_keluhan_req_dokter }} </li>
                <li>tanggal Keluhan : {{ $item->tgl_keluhan_res_dokter }}</li>
                <li>tanggal Diagnosa: </li>
                <li>Diagnosa : {{ $item->diagnosa }} </li>
                <li>Rp. Dokter</li>
                <li> keterangan </li>
                <li>lama proses</li>
            </ul>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>
            <h6>Pasien</h6>
        </td>
        <td>
            <h6>Apotik</h6>
        </td>
      </tr>
      <tr>
        <td>
            <ul>
                <li>Tgl Resep Dokter: {{ $item->tgl_keluhan_res_dokter }} </li>
                <li>Tgl Upload resep : {{ $item->tgl_keluhan_req_apotik }}</li>
                <li>lama proses</li>
            </ul>
        </td>
        <td>
            <ul>
                <li>Tgl resep pasien : {{ $item->tgl_keluhan_res_apotik }} </li>
                <li>Tgl Kirim Obat</li>
                <li>Rp. Obat</li>
                <li>Pengiriman </li>
                <li>lama proses</li>
            </ul>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
    @endforeach
</body>
</html>