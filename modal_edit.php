<?php
    include "koneksi.php";
	$gid=$_GET['gid'];
	// $modal=pg_query($koneksi,"SELECT * FROM public.ibadah WHERE gid='$gid'");
	$modal = pg_query($koneksi, "SELECT ST_Y(geom) as lat, ST_x(geom) as lon, kategori, nama,gid from ibadah WHERE gid='$gid'");
	while($r=pg_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">EDIT DATA</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
<!--                 <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">gid Dagri</label> -->
                    <input type="hidden" name="gid"  class="form-control" value="<?php echo $r['gid']; ?>" />
     				<!-- <input type="hidden" name="modal_name" disabled  class="form-control" value="<?php //echo $r['id']; ?>"/> -->
<!--                 </div> -->

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">gid</label>
                    <input type="hidden"  class="form-control" value="<?php echo $r['gid']; ?>">
     				<input type="text" disabled  class="form-control" value="<?php echo $r['gid']; ?>">
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Date">Nama</label>  
                    <input type="hidden" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>">     
                    <input type="text" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>">
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Date">Kategori</label>  
                    <input type="hidden" name="kategori"  class="form-control" value="<?php echo $r['kategori']; ?>">     
                    <!-- input type="text" name="kategori"  class="form-control" value="<?php //echo $r['kategori']; ?>"> -->
                    <select name="kategori" class="form-control">
                    <option value="Masjid">Masjid</option>
                    <option value="Gereja">Gereja</option>
                    <option value="Kelenteng">Kelenteng</option>
                    <option value="Vihara">Vihara</option>
                    <option value="Pura">Pura</option>
                  </select>
                </div>


                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Date">Latitude</label>  
                    <input type="hidden" name="lat"  class="form-control" value="<?php echo $r['lat']; ?>">     
                    <input type="text" name="lat"  class="form-control" value="<?php echo $r['lat']; ?>">
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Date">Longitude</label>  
                    <input type="hidden" name="lon"  class="form-control" value="<?php echo $r['lon']; ?>">     
                    <input type="text" name="lon"  class="form-control" value="<?php echo $r['lon']; ?>">
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

             <?php } ?>

            </div>

           
        </div>
    </div>