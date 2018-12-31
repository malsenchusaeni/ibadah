<?php
include "koneksi.php";
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$geom = pg_query("SELECT ST_SetSRID(ST_MakePoint($lon,$lat),4326) as geo");
while($r=pg_fetch_array($geom)){
pg_query("INSERT INTO public.ibadah(kategori, nama, geom) VALUES ('$kategori', '$nama', '$r[geo]')");
}
header('location:index.php');
?>