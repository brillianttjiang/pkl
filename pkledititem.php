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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		.blkg{
			background-color: lavender;
		} 
	</style>
</head>
<body align=center style="background-image:url(bg.jpg);background-repeat: no-repeat;background-size: 1366px 768px;background-size: 100% 100%;background-attachment:fixed">
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
          <li><a href=\"pklchangepassadmin.php\">Password</a></li>
        </ul>
      </li>
      <li><a href=\"pkllihatitem.php\">View Items</a></li>
      <li><a href=\"pklcekinvoiceadmin.php\">Sales Invoice</a></li>
      <li><a href=\"pklcekhistoryadmin.php\">Sales History</a></li>
      <li><a href=\"pkllogout.php\">Logout</a></li>
    </ul>
  </div>
</nav>";
	?>
	<h1>
		<b>PT. PANGESTU FARMINDO MULIATAMA</b>
	</h1>
	<br>
	<div class="col-lg-4 col-lg-offset-4 blkg">
		<b>Edit Item</b>
	</div>
	<?php
	if (!isset($_SESSION["user"])) 
	{
		echo "Harap login dahulu. ";
		echo "<a href=\"pkllogin.html\">LOGIN DI SINI</a>";

	}
	else
	{
		?>
		<div class="col-lg-4 col-lg-offset-4 blkg">
		<form method="post" action="pklpedititem.php">
			<br>
			<br>
			Kode Obat(PBF)
			<br>
			<input type="text" name="iditem" class="form-control">
			<br>
			Kode Obat(POM)
			<br>
			<input type="text" name="iditem2" class="form-control">
			<br>
			Nama Barang
			<br>
			<input type="text" name="nama" class="form-control">
			<br>
			Nama Pabrik
			<br>
			<input type="text" name="pabrik" class="form-control">
			<br>		
			Stok
			<br>
			<input type="number" name="stok" class="form-control">
			<br>
			Kadaluarsa(yyyy-mm-dd)
			<br>
			<input type="text" name="expdate" class="form-control">
			<br>
			Harga
			<br>
			<input type="text" name="harga" class="form-control">
			<br>
			Satuan
			<br>
			<input type="text" name="satuan" class="form-control">
			<br>
			<br>
			<button class="btn btn-primary" type="submit">Change Item</button>
			<button class="btn btn-default" type="reset">Clear</button>
		</form>
		<a href="pkllihatitem.php"><button class="btn btn-default" >Back</button></a>

		<?php
	}
	?>
</body>
</html>