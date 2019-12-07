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

    <style>
    .loader-container{
        background: #EEE url();
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    }
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #ffa500;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 0.5s linear infinite;
        animation: spin 0.5s linear infinite;
        position: absolute;
        top: calc(50% - 100px);
        left: calc(50% - 80px);
        transform: translate(-50%, -50%);
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg)  }
        100% { -webkit-transform: rotate(360deg) }
    }

    @keyframes spin {
        0% { transform: rotate(0deg) }
        100% { transform: rotate(360deg) }
    }
</style>

<section class="loader-container">
    <center class="well-lg"><label class="control-label">Mengunduh</label></center>
    <div class="loader"></div>
</section>
<script>
    $(window).ready(function () {
        $('.loader-container').fadeOut('slow');
    });
</script>

    <script>
        $(document).ready( function () {
        $('#example').DataTable();
        } );
    </script>

    <style type="text/css">
        .blkg{
          background-color: lavender;
        }
        .no{
          color: red;
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
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>
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

			$user=$_SESSION["user"];
			$queryuser = "SELECT * FROM user WHERE username='" . $user . "'";
			$resultuser = mysqli_query($conn, $queryuser);
			$rowuser = mysqli_fetch_assoc($resultuser);
			$iduser=$rowuser["iduser"];
			$alamat=$rowuser["alamat"];
			$idkirim=$_POST["idkirim"];

			$total=0;

			$queryitem = "SELECT * FROM item";
			$resultitem = mysqli_query($conn, $queryitem);
			$jumlahitem = mysqli_num_rows($resultitem);
			

			for($x=1;$x<=$jumlahitem;$x++)
			{
				$rowitem = mysqli_fetch_assoc($resultitem);
				$jumlah[$x]=$_POST["$x"];
				$i[$x]=$rowitem["iditem"];

				$harga[$x]=$rowitem["harga"];
				$bayar[$x]=$jumlah[$x]*$harga[$x];
				$total=$total+$bayar[$x];
				$namaitem[$x]=$rowitem["nama"];
			}
			
			$tanggal=getdate();
			$tanggalorder=$tanggal["weekday"].",".$tanggal["mday"]." ".$tanggal["month"]." ".$tanggal["year"];

			$input0=0;
			
			for($x=1;$x<=$jumlahitem;$x++)
			{
				if($jumlah[$x]!=""||$jumlah[$x]!=0)
				{
					$input0=1;
				}
			}

			if($input0==1)
			{
				$querykirim = "UPDATE kirim SET(iduser=\"$iduser\",alamat=\"$alamat\",total=\"$total\",status=0) WHERE idkirim='" . $idkirim . "'";
				$resultkirim = mysqli_query($conn, $querykirim);
			}

			$queryorderkirim = "SELECT * FROM kirim order by idkirim  desc limit 1";
			$resultorderkirim = mysqli_query($conn, $queryorderkirim);
			$roworderkirim = mysqli_fetch_assoc($resultorderkirim);
			$idkirim=$roworderkirim["idkirim"];

			$queryy= "SELECT * FROM item";
			$resultt= mysqli_query($conn, $queryy);

			for($x=1;$x<=$jumlahitem;$x++)
			{

				$roww = mysqli_fetch_assoc($resultt);
				$iditem=$roww["iditem"];

				if($jumlah[$x]!=""&&$roww["stok"]!=0)
				{
					$querykirim = "UPDATE kirim SET(iduser=\"$iduser\",alamat=\"$alamat\",total=\"$total\",status=0) WHERE idkirim='" . $idkirim . "'";
					$queryorder= "INSERT INTO `order` (idkirim,iduser,iditem,jumlah,bayar,tanggalorder) VALUES (\"$idkirim\",\"$iduser\", \"$iditem\", \"$jumlah[$x]\", \"$bayar[$x]\",\"$tanggalorder\")";
					$resultorder = mysqli_query($conn, $queryorder);
					$stok[$x]=$roww["stok"];
					$stok[$x]=$stok[$x]-$jumlah[$x];
					$querystokitem = "UPDATE item SET stok=\"$stok[$x]\" WHERE iditem='" . $x . "'";
					$resultstokitem = mysqli_query($conn, $querystokitem);
					$status[$x]=$roworderkirim["status"]; 
				}
			}

			
			if ($queryorder) 
			{
				echo "INVOICE".$idkirim;
				echo "<br>
				<table class=\"table table-bordered\" id=\"example\">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama Barang</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
					</thead>";
					$y=1;
					for($x=1;$x<=$jumlahitem;$x++)
					{
						if($jumlah[$x]!="")
						{
							echo "<tr>";
							echo "<td>".$y."</td>";
							echo "<td>".$namaitem[$x]."</td>";
							echo "<td>".$harga[$x]."</td>";
							echo "<td>".$jumlah[$x]."</td>";
							echo "<td>".$bayar[$x]."</td>";
							if($status[$x]==0)
							{
								$statuskirim="Dipesan";
							}
							if($status[$x]==1)
							{
								$statuskirim="Dikirim";
							}
							echo "<td>".$statuskirim."</td>";
							echo "</tr>";
							$y++;
						}
					}
					echo "<b>Total:</b>".$total;
					echo "</table>Order lagi <a href=\"pklorder.php\">disini</a>";
				} 
				else 
				{
					echo "Order gagal!!";  
					echo "<br>Kembali ke <a href=\"pklorder.php\">menu order</a>";
				}	
			}
			?>
		</body>
		</html>