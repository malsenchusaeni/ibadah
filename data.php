<!doctype html>
<html lang="en">
<head>
<title></title>
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
 
<div class="container">
  <h2>Data Masjid Kota Semarang</h2>
<!--   <p>Per Kecamatan Tahun 2016</p>    -->

<p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a></p>   

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


<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Modal Name</label>
                  <input type="text" name="kode"  class="form-control" placeholder="Kode" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Description">Description</label>
                   <textarea name="kecamatan"  class="form-control" placeholder="Kecamatan" required/></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Date</label>
                  <input type="text" name="luas" class="form-control" plcaceholder="Luas" value="Luas" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>



<!-- Modal Popup untuk Edit--> 

<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>


<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_edit.php",
    			   type: "GET",
    			   data : {kode: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>
</body>
</html>

  



