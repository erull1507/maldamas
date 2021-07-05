<?php
include "koneksi.php";
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Belajar</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<h1>Menampilkan Database</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="table-responsive">
                    <table class="table table-bordered" width='20%'cellspacing="0">

                            <tr>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Tempat Lahir</th>
                          <th>Jurusan</th>
                          <th>Tahun Masuk</th>
                          <th>Jenis Kelamin</th>
                            </tr>
                        <tbody>

                        <?php
                            // perintah sql untuk menampilkan daftar bank yang berelasi dengan tabel kategori bank
                            $sql="select * from data_mahasiswa order by id asc";
                            $hasil=mysqli_query($koneksi,$sql);
                            //Menampilkan data dengan perulangan while
                            while ($data = mysqli_fetch_array($hasil)):                        
                        ?>
                        <tr>

                            <td><?php echo "$data[nim]"?></td>
                            <td><?php echo "$data[nama]"?></td>
                            <td><?php echo "$data[tgl_lhr]"?></td>
                            <td><?php echo "$data[tempat_lahir]"?></td>
                            <td><?php echo "$data[jurusan]"?></td>
                            <td><?php echo "$data[tahun_masuk]"?></td>
                            <td><?php echo "$data[jenis_kelamin]"?></td>
                        </tr>
                        <!-- bagian akhir (penutup) while -->
                        <?php endwhile; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</table>
  </body>
</html>