<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.responsive {
  width: 100%;
  height: auto;
}
</style>
</head>
<body>

<h2>Responsive Images</h2>

<table>
			<?php 
			include 'config.php';
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
			</tr>
			
		</table>

</body>
</html>
