<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Data Siswa</title>
   <link rel="stylesheet"href="css/properti.css">
   <!-- Add icon library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
   <script src="js/jquery-3.4.1.js"></script>
</head>

<body>
	
	<div class="navbar center">Data Siswa
		<button onclick="document.location='logout.php'" class="logout info right" role="button"> Logout</button>
	</div>
<div class="main">
	<table align="center" class="tbl" ><td>
		<!-- form pencarian -->
			<form method="GET" action="query.php" >
				<input class="myInput" type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" placeholder="Cari Nomer Pendaftaran" />
			</form>
		</td><td>
		<div class="kanan">
			<button onclick="document.location='export.php'" class="btn fa fa-folder" role="button"> Export</button>
		</div>
	</td></table>
	
        <div class="b">
            <table id="siswa">
				<thead>
                    <tr>
                          <th>Daftar</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Tempat Lahir</th>
                          <th>Jurusan</th>
                          <th>Jenis Kelamin</th>
                          <th width="50px">Gambar</th>
                          <th>Aksi</th>
                    </tr>
				</thead>
				<tbody>
                        <?php
						   //untuk menyambungkan dengan file koneksi.php
						   include('koneksi.php');

							//jika kita klik cari, maka yang tampil query cari ini
							if(isset($_GET['kata_cari'])) {
							 //menampung variabel kata_cari dari form pencarian
							 $kata_cari = $_GET['kata_cari'];

							 //mencari data dengan menggunakan query
							 $query = "SELECT * FROM data_mahasiswa WHERE nim like '%".$kata_cari."%'";
							} else {
							 //jika tidak ada pencarian, default yang dijalankan query ini
							 $query = "SELECT * FROM data_mahasiswa";
							}
							$result = mysqli_query($koneksi, $query);

							if(!$result) {
							 die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
							}
							//kalau ini melakukan foreach atau perulangan
							while ($data = mysqli_fetch_assoc($result)) {
						 ?>
						
                    <tr>
							<td><?php echo "$data[nim]"?></td>
                            <td><?php echo "$data[nama]"?></td>
                            <td><?php echo "$data[tgl_lhr]"?></td>
                            <td><?php echo "$data[tempat_lahir]"?></td>
                            <td><?php echo "$data[jurusan]"?></td>
                            <td><?php echo "$data[jenis_kelamin]"?></td>
                            <td><img src="gambar/<?php echo $data['gambar'];?>" class="rounded" width='90%' alt="Cinque Terre"></td>
                            <td>
								<a onclick="return confirm('Yakin data dihapus pak?')" href="hapus.php?nim=<?php echo $data['nim'];?>&gambar=<?php echo $data['gambar'];?>" onclick="konfirmasi()" class="btn fa fa-trash hapus" role="button"></a>
                            </td>
                    </tr>
						<?php
						}
						?>
                </tbody>
            </table>
		</div>
	</div>	
  </body>
</html>

