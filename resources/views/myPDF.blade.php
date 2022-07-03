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
                <li>Nama Pasien</li>
                <li>NIK</li>
                <li>No. peserta</li>
                <li>keluhan</li>
                <li>Tanggal</li>
            </ul>
        </td>
        <td>
            <ul>
                <li>Nama dokter</li>
                <li>Terima Keluhan</li>
                <li>tanggal Keluhan</li>
                <li>tanggal Diagnosa</li>
                <li>Diagnosa</li>
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
                <li>Tgl Resep Dokter</li>
                <li>Tgl Upload resep</li>
                <li>lama proses</li>
            </ul>
        </td>
        <td>
            <ul>
                <li>Tgl resep pasien</li>
                <li>Tgl Kirim Obat</li>
                <li>Rp. Obat</li>
                <li>Pengiriman</li>
                <li>lama proses</li>
            </ul>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
  
</body>
</html>