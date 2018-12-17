<?php require_once("auth.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
	</head>
	<style>
	.responsive {
  		max-width: 100%;
 	 	height: auto;
	</style>
	
	<body>
	<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
		<?php 
		include 'config.php';
		if(isset($_POST['upload'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$judul = $_POST['judul'];
			$deskripsi = $_POST['deskripsi'];
			$open_bid = $_POST['openBid'];
			$durasi=0;
			
					

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 2044070){	
					
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$query = "INSERT INTO item_lelang (id_item,no_riwayat,nama_item,judul_item,open_bid,deskripsi_item,waktu_lelang)
    							values ('$file_tmp','no_riwayat', '$nama','$judul','$open_bid','$deskripsi','$durasi')";
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
			$tampil="SELECT * FROM item_lelang ORDER BY id_item DESC LIMIT 1";
			$data = mysqli_query($sql,$tampil);
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<div>
					<?php echo $d['judul_item'];?>
				</div>
				
				<td>
					<img src="<?php echo "file/".$d['nama_item']; ?>" alt="Nature" class="responsive" width="100" height="200">
				</td>
				<div>
					<?php echo 'open BID:' .$d['open_bid'];?>
				</div>		
			</tr>
			<?php } ?>
		</table>
	</body>
</html>