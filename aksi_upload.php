<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
	</head>
	<body>
	<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
		<?php 
		include 'config.php';
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			
					

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$query = "INSERT INTO item_lelang (id_item,no_riwayat,nama_item,judul_item,deskripsi_item,waktu_lelang)
    							values (NULL,NULL, '$nama',NULL,NULL,NULL)";
    				$result = mysqli_query($sql,$query);
					if($result){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>

		<br/>
		<br/>
		<a href="upload_item.php">Upload Lagi</a>
		<br/>
		<br/>

		<table>
			<?php 
			
			while($d = mysqli_fetch_array($query)){
			?>
			<tr>
				<td>
					<img src="<?php echo "file/".$d['nama_item']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table>
	</body>
</html>