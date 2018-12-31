<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Bootstrap tab panel example</title>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<link rel="stylesheet" href="css/style.css">
	<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>

<body>

  
<div class="container"><h1>Bootstrap  tab panel example (using nav-pills)  </h1></div>
<div id="exTab2" class="container">	
		<ul  class="nav nav-pills">
			<li class="active"><a  href="#1a" data-toggle="tab">Overview</a></li>
			<li><a href="#2a" data-toggle="tab">Using nav-pills</a></li>
			<li><a href="#3a" data-toggle="tab">Applying clearfix</a></li>
  			<li><a href="#4a" data-toggle="tab">Background color</a></li>
		</ul>

			<div class="tab-content clearfix">
				<div class="tab-pane active" id="1a">
<br><br>
<table id="mytable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <th>No</th>
      <th>Nama Masjid</th>
      <th>Lat</th>
      <th>Lng</th>
      <th>Aksi</th>
    </thead>
<?php 
  //menampilkan data mysqli
  include "koneksi.php";
  $no = 0;
  $modal=pg_query($koneksi,"SELECT * FROM pendataan");
  while($r=pg_fetch_array($modal)){
  $no++;
       
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['kode']; ?></td>
      <td><?php echo  $r['kecamatan']; ?></td>
      <td><?php echo  $r['luas']; ?></td>
      <td>
         <a href="#" class='open_modal btn btn-success' id='<?php echo  $r['kode']; ?>'>Edit</a>
         <a href="#" onclick="confirm_modal('proses_delete.php?&kode=<?php echo  $r['kode']; ?>');">Delete</a>
      </td>
  </tr>
<?php } ?>
</table>


				</div>
				<div class="tab-pane" id="2a">
	          		<h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
				</div>
	        	<div class="tab-pane" id="3a">
	          		<h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
				</div>
	          	<div class="tab-pane" id="4a">
	          		<h3>We use css to change the background color of the content to be equal to the tab</h3>
				</div>
			</div>
</div>


<hr></hr>

  </div>


<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  

</body>

</html>
