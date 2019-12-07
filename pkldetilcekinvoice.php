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

    <script>
        $(document).ready( function () {
        $('#example').DataTable();
        } );
    </script> 
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
</nav>";
	?>
	<h1>
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>
	<div class="col-lg-5 col-lg-offset-4 blkg">
		<?php
		if (!isset($_SESSION["user"])) 
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

			$queryorder = "SELECT * FROM `order` WHERE jumlah>0 and idkirim='" . $_POST["idkirim"] . "'";
			$resultorder = mysqli_query($conn, $queryorder);
			$jumlahorder = mysqli_num_rows($resultorder);
			$idkirim=$_POST["idkirim"];

			$total=0;

			if ($resultorder) 
			{
				echo "INVOICE".$idkirim;
				echo "<br>";
				echo"<form method=\"post\" action=\"pklphapusinvoice.php\">";
					echo"<input type=\"hidden\" value=".$idkirim." name=\"idkirim\">	
				<button class=\"btn btn-danger\" type\"submit\">Hapus Invoice(hati-hati)</button></form>";
				echo "<br>
				<table class=\"table table-hover\" id=example>
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama Obat</th>
						<th>No Batch</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
					</tr>
					</thead>";
					$y=1;
					$queryitem = "SELECT * FROM item natural join `order` WHERE idkirim='".$idkirim."' AND jumlah>0 ";
					$resultitem = mysqli_query($conn, $queryitem);

					for($x=1;$x<=$jumlahorder;$x++)
					{
						$row = mysqli_fetch_assoc($resultorder);
						$iditem[$x]=$row["iditem"];

						$rowitem = mysqli_fetch_assoc($resultitem);
						$namaitem[$x]=$rowitem["nama"];

						echo "<tr>";
						echo "<td>".$y."</td>";
						echo "<td>".$rowitem["nama"]."</td>";
						echo "<td>".$rowitem["batch"]."</td>";
						echo "<td>".$rowitem["harga"]."</td>";
						echo "<td>".$row["jumlah"]."</td>";
						echo "<td>".$row["bayar"]."</td>";
						echo "</tr>";
						$total=$total+$row["bayar"];
						$y++;
					}
					echo"</table><br>";
					echo"<form method=\"post\" action=\"pklkonfirmasiinvoice.php\">";
					echo"<div class=\"checkbox\">
					<label><input type=\"checkbox\" value=\"2\" name=\"konfirmasi\">Sudah Terima</label>
				</div><input type=\"hidden\" value=".$idkirim." name=\"idkirim\">	
				<button class=\"btn btn-primary\" type\"submit\">Konfirmasi</button></form>";

					$querycustomer = "SELECT nama,alamat,notelp,npwp FROM user natural join `kirim` WHERE idkirim='".$idkirim."'";
					$resultcustomer = mysqli_query($conn, $querycustomer);
					$rowcustomer = mysqli_fetch_assoc($resultcustomer);
					$nc=$rowcustomer["nama"];
					$ac=$rowcustomer["alamat"];
					$ntc=$rowcustomer["notelp"];
					$npc=$rowcustomer["npwp"];
					echo "<b>".$nc."</b><br>";
					echo "<b>".$ac."</b><br>";

				$querykirim = "SELECT * FROM kirim WHERE idkirim='".$idkirim."'";
				$resultkirim= mysqli_query($conn, $querykirim);
				$rowkirim = mysqli_fetch_assoc($resultkirim);
				$tanggalkirim=$rowkirim["tanggalkirim"];
				$tanggalorder=$rowkirim["tanggalorder"];
				echo "<b>Tanggal Order:</b>".$tanggalorder,"<br>";
				echo "<b>Tanggal Kirim:</b>".$tanggalkirim,"<br>";
				echo "<b>Total:</b>".$total;
				echo "<br>
				<button onclick=\"myFunction()\">Print</button><br>
				<a href=\"pklcekinvoice.php\"><button class=\"btn btn-default\" >Back</button></a>";
			} 
		}

		?>
		<script>
     		 function myFunction() 
     		 {
         	window.print();
      		 }
      	</script>
	</body>
	</html>















	