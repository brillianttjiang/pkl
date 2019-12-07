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
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
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
			$SERVER = "localhost";
			$DATABASE = "pkl";
			$USER = "root";
			$PASS = "";
			echo "INVOICE";
			$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

			$querykirim = "SELECT * FROM kirim NATURAL JOIN user WHERE status=2";
			$resultkirim = mysqli_query($conn, $querykirim);
			$jumlahkirim = mysqli_num_rows($resultkirim);
			
			for($x=1;$x<=$jumlahkirim;$x++)
			{
				$rowkirim = mysqli_fetch_assoc($resultkirim);
				$idkirim[$x]=$rowkirim["idkirim"];
				$alamat[$x]=$rowkirim["alamat"];
				$total[$x]=$rowkirim["total"];
				$status[$x]=$rowkirim["status"];
				$nama[$x]=$rowkirim["nama"];
			}

			echo "<br>
			<table class=\"table table-bordered\">
				<tr>
					<th>Nomor Invoice</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Total</th>
					<th>Status</th>
					<th>Detil</th>
				</tr>";
				

				if ($resultkirim) 
				{
					$y=1;
					for($x=1;$x<=$jumlahkirim;$x++)
					{	
						echo "<tr>";
						echo "<td>".$y."</td>";
						echo "<td>".$nama[$x]."</td>";
						echo "<td>".$alamat[$x]."</td>";
						echo "<td>".$total[$x]."</td>";
						if($status[$x]==0)
						{
							$statuskirim="Dipesan";
						}
						if($status[$x]==1)
						{
							$statuskirim="Dikirim";
						}
						echo "<td>".$statuskirim."</td>";
						echo "<td><form method=\"post\" action=\"pkldetilcekinvoiceadmin.php\">
						<input type=\"hidden\" value=".$idkirim[$x]." name=\"idkirim\">
						<button class=\"btn btn-default\" type=\"submit\">Detil</button></form></td>";
						$y++;
						echo"</tr>";
					}
				}
				echo "</table>";
				echo "<a href=\"pklmenu.php\"><button class=\"btn btn-default\" >Back</button></a>";
			}
			?>
		</body>
		</html>