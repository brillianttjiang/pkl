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
		#panel, #flip{
   		padding: 5px;
    	text-align: center;
    	background-color: #e5eecc;
    	border: solid 1px #c3c3c3;
    	}
    	#panel{
    	padding: 50px;
    	display: none;
    	}
	</style>

	<script> 
  	$(document).ready(function(){
  	$("#flip").click(function(){
  	$("#panel").slideToggle("slow");
    });
    });
 	</script>

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
</head>
<body>
<section class="loader-container">
    <center class="well-lg"><label class="control-label">Mengunduh</label></center>
    <div class="loader"></div>
</section>
<script>
    $(window).ready(function () {
        $('.loader-container').fadeOut('slow');
    });
</script>
</head>
<body align=center style="background-image:url(bg.jpg);background-repeat: no-repeat;background-size: 1366px 768px;background-attachment:fixed"">
		<?php
		if(!isset($_POST['user']))
		{
			echo "Harap login dahulu. ";
			echo "<a href=\"pkllogin.html\">LOGIN die() SINI</a>";
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

			$user = $_POST['user'];
			$pass = $_POST['pass'];

			$query = "SELECT * FROM user WHERE username='" . $user . "'";

			$result = mysqli_query($conn, $query);

			if ($result)
			{
				$row = mysqli_fetch_row($result);
				if ($row[3] == $pass) 
				{
					if($row[7]==0)
					{
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
      <li><a href=\"pkllogout.php\">Logout</a></li>
    </ul>
  </div>
</nav>";
						echo "
						<h1>
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>
	Login berhasil. Selamat datang Customer <h1>" . $row[2]."</h1><br>";
						echo "
            <div id=\"flip\">Baca Data Lengkap</div>
            <div id=\"panel\">
            <table class=\"table table-hover\"   align=\"center\">
            <tr>
              <td>Alamat</td>
              <td>No Telp</td>
              <td>NPWP</td>
            </tr>
            <tr>
              <td>".$row[4]."</td>
              <td>".$row[5]."</td>
              <td>".$row[6]."</td>
            </tr>
            </table>
            </div>
            <br>
						<div class=\"container\"> 
  <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
    <!-- Indicators -->
    <ol class=\"carousel-indicators\">
      <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
      <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
      <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class=\"carousel-inner\">
      <div class=\"item active\">
        <img src=\"1.jpg\" alt=\"Los Angeles\" style=\"width:100%;\">
      </div>

      <div class=\"item\">
        <img src=\"2.jpg\" alt=\"Chicago\" style=\"width:100%;\">
      </div>
    
      <div class=\"item\">
        <img src=\"3.jpg\" alt=\"New york\" style=\"width:100%;\">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
      <span class=\"glyphicon glyphicon-chevron-left\"></span>
      <span class=\"sr-only\">Previous</span>
    </a>
    <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
      <span class=\"glyphicon glyphicon-chevron-right\"></span>
      <span class=\"sr-only\">Next</span>
    </a>
  </div>
</div>";
						$_SESSION['iduser']=$row[0];
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
					}
					else
					{
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
						echo "
						<h1>
		<b>
			PT. PANGESTU FARMINDO MULIATAMA
		</b>
	</h1>
	<br>Login berhasil. Selamat datang Admin <h1>" . $row[2]."</h1>";
						echo "<br>
						<div class=\"container\"> 
  <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
    <!-- Indicators -->
    <ol class=\"carousel-indicators\">
      <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
      <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
      <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class=\"carousel-inner\">
      <div class=\"item active\">
        <img src=\"1.jpg\" alt=\"Los Angeles\" style=\"width:100%;\">
      </div>

      <div class=\"item\">
        <img src=\"2.jpg\" alt=\"Chicago\" style=\"width:100%;\">
      </div>
    
      <div class=\"item\">
        <img src=\"3.jpg\" alt=\"New york\" style=\"width:100%;\">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
      <span class=\"glyphicon glyphicon-chevron-left\"></span>
      <span class=\"sr-only\">Previous</span>
    </a>
    <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
      <span class=\"glyphicon glyphicon-chevron-right\"></span>
      <span class=\"sr-only\">Next</span>
    </a>
  </div>
</div>";		
						$_SESSION['iduser']=$row[0];
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
					}
				} 
				else 
				{
					echo "Kombinasi username dan password salah<br>"; 
					echo "Login <a href=\"pkllogin.html\">disini</a>";
				}

			} 
			else 
			{
				echo "Kombinasi username dan password salah<br>";
				echo "Login <a href=\"pkllogin.html\">disini</a>";
			}  
		}
		?>
	</body>
	</html>