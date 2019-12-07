<!DOCTYPE html>
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
  <div class="col-lg-4 col-lg-offset-4 blkg">
    <h3>Order</h3>
    <form method="post" action="pkllogin.php">
      <table class=\"table table-bordered\">
        <th>
        Nama Barang
        <input class="form-control" type="text" name="namabarang" style="width:100px">
        </th>
          <th>
        Box
        <input class="form-control" type="text" name="box" style="width:100px">
        </th>
        <th>
        Jumlah
        <input class="form-control" type="text" name="jumlah" style="width:100px" id="jumlah" onchange="totalItem(this.value, -9)">
        </th>
       <th>
        Harga satuan
        <input class="form-control" type="text" name="hargasatuan" style="width:100px" id="hargasatuan" onchange="totalItem(=9, this.value)">
        </th>
          <th>
        %disc
        <input class="form-control" type="text" name="disc" style="width:100px">
        </th>
          <th>
        Rp.disc
        <input class="form-control" type="text" name="rpdisc" style="width:100px">
        </th>
          <th>
        Total item
        <input class="form-control" type="text" name="totalitem" style="width:100px" id="totalitem">
        </th>
          <th>
        Gd
        <input class="form-control" type="text" name="gd" style="width:100px">
        </th>
          <th>
        Nomer Batch
        <input class="form-control" type="text" name="nobatch" style="width:100px">
        </th>
      </table>
        <button class="btn btn-primary" type="submit">Accept</button>
        <button class="btn btn-default" type="reset">Clear</button>
        <br>
      </form>
  </div>
<script>
  function totalItem(a, b)
  {
    if(a!=-9)
    {
    var jumlah=a;
  }
  else
  {
    var jumlah = 0;
  }
    if(b!=-9)
    {
    var hargasatuan=b;
  }
  else
  {
    var hargasatuan = 0;
  }
    if(jumlah!=0&&hargasatuan!=0)
    {
      alert('a');
      $('#totalitem').html(jumlah*hargasatuan);
    }
  }
  </script>
</body>
</html>

