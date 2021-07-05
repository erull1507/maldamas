<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <link rel="stylesheet"href="css/properti.admin.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="js/jquery-3.4.1.js"></script>
</head>
<body>
	<?php 
        session_start();		
        // cek apakah yang mengakses halaman ini sudah login ?>
	
    <!--effect box -->
    <div class="container">
        <div class="text">Daftar Siswa Baru</div> 
		
		<!--effect form -->
        <form action="simpangambar.php" method="post" enctype="multipart/form-data">            
        <input type="hidden" value="<?php echo $data['id'];?>" name="id_mahasiswa"> 
		
			
			<!--jarak row -->
			<div class="label">Nomer Pendaftaran</div>
			<div class="form-row">
				<input class="border-input" placeholder="Nomer Pendaftaran" type="text" name="nim" required>
			</div>
			
			<div class="label">Nama Lengkap</div>
			<div class="form-row">
				<input class="border-input" placeholder="Nama Lengkap" type="text" name="nama" required>
			</div>
            
			<div class="label">Jenis Kelamin</div>
            <div class="form-row">                
            		<select class="border-input" name="jenis_kelamin" required>
						<option value="L">Laki Laki</option>
						<option value="P">Perempuan</option>
					</select> 
            </div>	
			
			<div class="label">Tempat Lahir</div>
			<div class="form-row">
                <input class="border-input" placeholder="Tempat Lahir" type="text" name="tmptlahir" required>
            </div>
			
			<div class="label">Tanggal Lahir</div>
			<div class="form-row">
				<input class="border-input" type="date" name="tgl_lahir" required>
            </div>
			
			<div class="label">Jurusan</div>
			<div class="form-row">
                    <select class="border-input" name="jurusan">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
            </div>
			
			<table><td>
			<div class="label">Upload Foto</div>
            <div class="form-row">
				<button class="button btn-gmr" type="button" id="pilih_gambar" class="browse ">Upload Foto</button>
                <input class="border-input2" disabled type="text"  id="file">				
                <input type="file" name="gambar" class="file" >                				
			</div></td><td>
			<img src="gambar/80x80.png" id="preview" class="lihatgmr"></td></table>
			
		<div class="center">
		<button class="button" type="submit" name="btn_simpan">Simpan</button></div>
		</form> 
    </div>    
</body>
</html>

<script>
    $(document).on("click", "#pilih_gambar", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
</script>
