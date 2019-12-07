<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<style type="text/css">
		.blkg{
			background-color: lavender;
		} 
	</style>
</head>
<body align=center style="background-image:url(bg.jpg);background-repeat: no-repeat;background-size: 1366px 768px;">
	<h1>
		<b>PT. PANGESTU FARMINDO MULIATAMA</b>
	</h1>
	<br>
	<div class="col-lg-4 col-lg-offset-4 blkg">
		<?php
		$SERVER = "localhost";
		$DATABASE = "pkl";
		$USER = "root";
		$PASS = "";

		$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

		if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		}
		$user= $_POST["user"];
		$name= $_POST["name"];
		$pass= $_POST["pass"];
		$alamat= $_POST["alamat"];
		$notelp= $_POST["notelp"];
		$npwp= $_POST["npwp"];


		$query = "INSERT INTO user (username,nama,password,alamat,otoritas,notelp,npwp) 
		VALUES (\"$user\", \"$name\" , \"$pass\", \"$alamat\",0,\"$notelp\",\"$npwp\")";

		$result = mysqli_query($conn, $query);

		if ($result) 
		{
			echo "Register berhasil!";
			echo "<br>Login <a href=\"pkllogin.html\">disini</a>";
		} 
		else 
		{
			echo "Register gagal! Username sudah ada!";  
			echo "<br>Kembali ke <a href=\"pklregis.html\">menu register</a>";
		}	
		?>
	</div>
</body>
</html>