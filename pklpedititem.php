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
	<?php
	echo "<nav class=\"navbar navbar-inverse\">
  <div class=\"container-fluid\">
    <div class=\"navbar-header\">
      <a class=\"navbar-brand\" href=\"pklmenu.php\">PT.PANGESTU</a>
    </div>
    <ul class=\"nav navbar-nav\">
      <li class=\"active\"><a href=\"pklmenu.php\">Home</a></li>
       <li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Change<span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"pklchangedata.php\">Data</a></li>
          <li><a href=\"pklchangepass.php\">Password</a></li>
        </ul>
      </li>
      <li><a href=\"pkllihatitem.php\">Lihat Item</a></li>
      <li><a href=\"pklcekinvoiceadmin.php\">Invoice</a></li>
      <li><a href=\"pklcekhistoryadmin.php\">History</a></li>
    </ul>
  </div>
</nav>";
	?>
	<h1>
		<b>PT. PANGESTU FARMINDO MULIATAMA</b>
	</h1>
	<br>
	<div class="col-lg-4 col-lg-offset-4 blkg">
		<?php
		if (!isset($_SESSION["user"])) 
		{
			echo "Harap login dahulu. ";
			echo "<a href=\"pkllogin.html\">LOGIN DI SINI</a>";
		}
		else
		{
			$iditem = $_POST['iditem'];
			$nama = $_POST['nama'];
			$pabrik = $_POST['pabrik'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$expdate = $_POST['expdate'];
			$satuan = $_POST['satuan'];

			$SERVER = "localhost";
			$DATABASE = "pkl";
			$USER = "root";
			$PASS = "";

			$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			}

			if($_POST['iditem']==''||$_POST['nama']==''||$_POST['pabrik']==''||$_POST['harga']==''||$_POST['stok']==''||$_POST['expdate']==''||$_POST['satuan']=='')
			{
				echo"Ada data yang belum terisi, silahkan <a href=\"pkledititem.php\">kembali</a>";
			}

			else
			{
	
				$query = "SELECT * FROM item WHERE iditem='" . $iditem . "'";
				$result = mysqli_query($conn, $query);

				if ($result)
				{
							$querynama = "UPDATE item SET nama=\"$nama\" WHERE iditem='" . $iditem . "'";
							$resultnama = mysqli_query($conn, $querynama);
							$querypabrik = "UPDATE item SET pabrik=\"$pabrik\" WHERE iditem='" . $iditem . "'";
							$resultpabrik = mysqli_query($conn, $querypabrik);
							$queryharga = "UPDATE item SET harga=\"$harga\" WHERE iditem='" . $iditem . "'";
							$resultharga = mysqli_query($conn, $queryharga);
							$querystok = "UPDATE item SET stok=\"$stok\" WHERE iditem='" . $iditem . "'";
							$resultstok = mysqli_query($conn, $querystok);
							$queryexp = "UPDATE item SET expdate=\"$expdate\" WHERE iditem='" . $iditem . "'";
							$resultexp = mysqli_query($conn, $queryexp);
							$querysatuan = "UPDATE item SET satuan=\"$satuan\" WHERE iditem='" . $iditem . "'";
							$resultsatuan = mysqli_query($conn, $querysatuan);

							if ($resultnama&&$resultharga&&$resultstok&&$resultexp&&$resultpabrik&&$resultsatuan)
							{
								echo "Selamat Item anda sudah terganti!";
								echo "<br>Kembali ke <a href=\"pkllihatitem.php\">Menu</a>";
							}
							else
							{
								echo "Ubah Item gagal!<br>"; 
								echo "Perbaiki <a href=\"pkledititem.php\">disini</a>";
							}
				}
			}
		}
		?>
	</div>
</body>
</html>