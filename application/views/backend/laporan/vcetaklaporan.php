<!DOCTYPE html>
<html><head>
  <title><?=$title?></title>
  <style>
  table{
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
  }
  table th{
    border:1px solid #000;
    padding: 3px;
    font-weight: bold;
    text-align: center;
  }
  table td{
    border:1px solid #000;
    padding: 3px;
    vertical-align: top;
  }
</style>
</head><body>
  <p style="text-align: center" linespacing="1">
    <b>LAPORAN DATA ALUMNI</b>
    <br>
    <b>STKIP AISYIYAH RIAU</b>
    <br>
    Jl. Angkasa No.12 RT.006/RW.001 Kelurahan Air Hitam, Kecamatan Payung Sekaki – Kota Pekanbaru, Kodepos: 28292.
    <br>
    +62 761-39911+62 853-5590-2657 stkipaisyiyahriau@yahoo.co.id
    <hr>
  </p>

  <table>
    <tr style="background: #3d82d0;">
      <th style="width: 3%">No</th>
      <th style="width: 10%">Nama Lengkap</th>
      <th style="width: 6%">Nim</th>
      <th style="width: 3%">JK</th>
      <th style="width: 10%">Email</th>
      <th style="width: 7%">Telp</th>
      <th style="width: 6%">Tempat</th>
      <th style="width: 7%">Tgl Lahir</th>
      <th style="width: 6%">Lulus</th>
      <th style="width: 6%">Jurusan</th>
      <th style="width: 6%">Agama</th>
      <th style="width: 7%">Profesi</th>
      <th>Alamat</th>
    </tr>
    <?php $no=0; foreach($alumni as $row){
      $no++;
      ?>
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nama_lengkap;?></td>
        <td><?php echo $row->username;?></td>
        <td>
          <?php
          $jk = $row->jenis_kelamin;
          if ($jk == "Laki-laki") {
            echo "L";
          } else echo "P";
          ?>
        </td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->telp;?></td>
        <td><?php echo $row->tempat_lahir;?></td>
        <td><?php echo date("d-m-Y", strtotime($row->tanggal_lahir));?></td>
        <td><?php echo $row->tahun_lulus;?></td>
        <td><?php echo $row->singkatan;?></td>
        <td><?php echo $row->agama;?></td>
        <td><?php echo $row->profesi;?></td>
        <td><?php echo $row->alamat;?></td>
      </tr>
      <?php }?>
    </table>
</body></html>
