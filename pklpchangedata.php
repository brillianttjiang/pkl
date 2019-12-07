<?php 
session_start();
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="http//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style type="text/css">
		.blkg{
			background-color: lavender;
		} 
	</style>
</head>
<body align=center style="background-image:url(bg.jpg);background-repeat: no-repeat;background-size: 1366px 768px;">
	<?php
      $SERVER = "localhost";
      $DATABASE = "pkl";
      $USER = "root";
      $PASS = "";

      $conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

      $query = "SELECT * FROM user WHERE username='" . $_SESSION["user"] . "'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_row($result);
  echo "<nav class=\"navbar navbar-inverse\">
  <div class=\"container-fluid\">
    <div class=\"navbar-header\">
      <a class=\"navbar-brand\" href=\"pklmenu.php\">PT.PANGESTU</a>
      <a class=\"navbar-brand\">".$row[2]."</a>
    </div>
    <ul class=\"nav navbar-nav\">
      <li class=\"active\"><a href=\"pklmenu.php\">Home</a></li>
       <li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Change<span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"pklchangedata.php\">Data</a></li>
          <li><a href=\"pklchangepass.php\">Password</a></li>
        </ul>
      </li>
      <li><a href=\"pklorder.php\">Order</a></li>
      <li><a href=\"pklcekinvoice.php\">Sales Invoice</a></li>
      <li><a href=\"pklcekhistory.php\">Sales History</a></li>
      <li><a href=\"pkllogout.php\">Logout</a></li
    </ul>
  </div>
</nav>"
?>;
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
			$user=$_SESSION["user"];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$notelp = $_POST['notelp'];
			$npwp = $_POST['npwp'];

			$SERVER = "localhost";
			$DATABASE = "pkl";
			$USER = "root";
			$PASS = "";

			$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			}

			if($_POST['nama']==''||$_POST['alamat']=='')
			{
				echo"Ada data yang belum terisi, silahkan <a href=\"pklchangedata.php\">kembali</a>";
			}

			else
			{	
				$query = "SELECT * FROM user WHERE username='" . $user . "'";

				$result = mysqli_query($conn, $query);

				if ($result)
				{
					$row = mysqli_fetch_row($result);
					

					$query = "UPDATE user SET nama=\"$nama\",alamat=\"$alamat\",notelp=\"$notelp\",npwp=\"$npwp\" WHERE username='" . $user . "'";
					$result = mysqli_query($conn, $query);
					if ($result)
					{
						echo "Selamat data anda sudah terganti!";
						echo "<br>Kembali ke <a href=\"pklmenu.php\">Menu</a>";
					}
					else
					{
						echo "Ubah Data gagal!<br>"; 
						echo "Perbaiki <a href=\"pklchangedata.php\">disini</a>";
					}
				}
			}
		}
		?>
	</div>
</body>
</html>