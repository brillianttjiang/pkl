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
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>
	Edit Stok Sukses!
		<?php
		if (!isset($_SESSION['user'])) 
		{
			echo "Harap login dahulu. ";
			echo "<a href=\"pkllogin.html\">LOGIN DI SINI</a>";
		}  
		else
		{
			echo "<table class=\"table table-bordered\" id=\"example\">
			<thead>
			<tr>
				<th>Nomor</th>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
			</tr>
			</thead>";
			$SERVER = "localhost";
			$DATABASE = "pkl";
			$USER = "root";
			$PASS = "";

			$conn = mysqli_connect($SERVER, $USER, $PASS, $DATABASE);

			if (!$conn) 
			{
				die("Connection failed: " . mysqli_connect_error());
			}

			$query = "SELECT * FROM item";
			$result = mysqli_query($conn, $query);
			$a=mysqli_num_rows($result);

			for($i=1;$i<=$a;$i++)
			{
				$row=mysqli_fetch_assoc($result);
				$stok[$i]=$_POST[$i];
			}

			$query = "SELECT * FROM item";
			$result = mysqli_query($conn, $query);

			if ($result)
			{
				for($i=1;$i<=$a;$i++)
				{
					$row=mysqli_fetch_assoc($result);
					if($stok[$i]!="")
					{
						$queryupdate = "UPDATE item SET stok=$stok[$i] WHERE iditem=".$row["iditem"];
						$resultupdate = mysqli_query($conn, $queryupdate);
					}
				}
			}

			$query = "SELECT * FROM item";
			$result = mysqli_query($conn, $query);
			for($i=1;$i<=$a;$i++)
			{
				$row=mysqli_fetch_assoc($result);
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row["nama"]."</td>";
				echo "<td>".$row["harga"]."</td>";
				if($row["stok"]<=100)
                    {
					echo "<td><font color=\"red\">".$row["stok"]."</font></td>";
                    }
                    else
                    {
                    echo "<td>".$row["stok"]."</td>"; 
                    }
				echo "</tr>";
			}
			echo "</table>
			<a href=\"pklmenu.php\"><button class=\"btn btn-default\" >Menu</button></a>";
		}
		?>
	</body>
	</html>