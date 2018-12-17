
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
</head>
<body>
	<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
	<div class="form-group">
	</div>
	<form action="aksi_upload" method="POST"  >
		
		
		
		
		
	</form>
	<form action="aksi_upload" method="POST"  >
		
		
		
	</form>
	<form action="aksi_upload.php" method="post" enctype="multipart/form-data">
		
		<div class="form-group">

		<input type="text" name="judul" placeholder="judul Lelang" class="form-control" value="" />

		</div>
		<div class="form-group">

		<input type="number" name="openBid" placeholder="open BID" class="form-control" min="0"/>

		</div>
		<div class="form-group">
			<textarea name="deskripsi" cols="45" row="5" placeholder="deskripsi"></textarea>
		</div>
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload">
		
		
	</form>
	
</body>
</html> 