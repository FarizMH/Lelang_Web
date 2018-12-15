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
		
		
		<input class="form-control" type="text" name="judul" placeholder="judul Lelang" />
		
		
	</form>
	<form action="aksi_upload" method="POST"  >
		<textarea name="deskripsi" cols="45" row="5" placeholder="deskripsi"></textarea>
	
	</form>
	<form action="aksi_upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload">
		
		
	</form>
	
</body>
</html> 