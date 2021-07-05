<?php
    include 'koneksi.php';
    $nim=$_GET["nim"];
    $gambar=$_GET["gambar"];
    $sql="delete from data_mahasiswa where nim=$nim";
    $hapus_bank=mysqli_query($koneksi,$sql);

    //Menghapus file gambar
    unlink("gambar/".$gambar);

    if ($hapus_bank) {
        header("Location:query.php?hapus=berhasil");
    }
    else {
        header("Location:index.php?hapus=gagal");

    }
?>