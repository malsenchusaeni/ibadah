<?php
	include "koneksi.php";
	$gid=$_GET['gid'];
	$modal=pg_query($koneksi,"DELETE FROM public.ibadah WHERE gid='$gid'");
	header('location:index.php');
?>