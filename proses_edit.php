<?php
	include "koneksi.php";
	// $kode=$_POST['kode'];
	// $kecamatan = trim($_POST['kecamatan']);
	// $luas = $_POST['luas'];

	$gid = $_POST['gid'];
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	$geom = pg_query("SELECT ST_SetSRID(ST_MakePoint($lon,$lat),4326) as geo");

	while($r=pg_fetch_array($geom)){
		$save=pg_query($koneksi,"UPDATE public.ibadah SET nama = '$nama',kategori = '$kategori', geom = '$r[geo]' WHERE gid = '$gid'");
	}
	header('location:index.php');

?>