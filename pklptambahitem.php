<?php 
session_start();
?>
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
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>
	<b>Input Barang</b>
	<br>
	<div class="col-lg-4 col-lg-offset-4 blkg">
		<?php
		if (!isset($_SESSION['user'])) 
		{
			echo "Harap login dahulu. ";
			echo "<a href=\"pkllogin.html\">LOGIN DI SINI</a>";
		}  
		else
		{
			$SERVER = "localhost";
			$DATABASE = "pkl";
			$USER = "root";
			$PASS = "";

			$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$iditem2= $_POST["iditem2"];
			$nama= $_POST["nama"];
			$pabrik= $_POST["pabrik"];
			$batch= $_POST["batch"];
			$harga= $_POST["harga"];
			$stok= $_POST["stok"];
			$expdate= $_POST["expdate"];
			$satuan= $_POST["satuan"];

			$query = "INSERT INTO item (iditem2,nama,pabrik,batch,harga,stok,expdate,satuan) 
			VALUES (\"$iditem2\",\"$nama\",\"$pabrik\",\"$batch\", \"$harga\" , \"$stok\",\"$expdate\",\"$satuan\")";

			$result = mysqli_query($conn, $query);

			if ($result) 
			{
				echo "Penambahan Item berhasil!";
				echo "<br>Kembali ke <a href=\"pklmenu.php\">menu</a>";
			} 
			else 
			{
				echo "Register gagal!";  
				echo "<br>Kembali ke <a href=\"pkltambahitem.php\">menu register</a>";
			}	
		}
		?>


	</body>
	</html>