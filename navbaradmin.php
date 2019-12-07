<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PT.PANGESTU</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="pklmenu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Change<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="pklchangepassadmin.php">Password</a></li>
        </ul>
      </li>
      <li><a href="pkllihatitem.php">Lihat Item</a></li>
      <li><a href="pklcekinvoiceadmin.php">Invoice</a></li>
      <li><a href="pklcekhistoryadmin.php">History</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
