<?php
    
    $nim            = $_POST['nim'];
    $nama           = $_POST['nama'];
    $kelamin        = $_POST['jenis_kelamin'];
    $tgllahir       = $_POST['tgl_lahir'];
    $tmptlahir      = $_POST['tmptlahir'];
    $jurusan        = $_POST['jurusan'];

    if (isset($_POST['btn_simpan'])) {
        //Include file koneksi, untuk koneksikan ke database

        include 'koneksi.php';
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $ekstensi_diperbolehkan	= array('png','jpg');
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];
			
            $pilih="select * from data_mahasiswa where nim='$nim'";
			$cek=mysqli_query($koneksi, $pilih);
 
			   $jumlah_data = mysqli_num_rows($cek);
			   if ($jumlah_data >= 1 ) 
			   {
					echo "<script>alert('NIM yang sama sudah digunakan');history.go(-1);</script>";
				}else{
					/*simpan photo ke direktory*/
					move_uploaded_file($file_tmp, 'gambar/'.$gambar);
					
					$sql="INSERT INTO data_mahasiswa SET  nim='$nim',nama='$nama',tgl_lhr='$tgllahir',tempat_lahir='$tmptlahir',jurusan='$jurusan',jenis_kelamin='$kelamin',gambar='$gambar'";
					$result  = mysqli_query($koneksi, $sql);
                    header("Location:query.php?nim=berhasil");
				}    
		}
    }
?>