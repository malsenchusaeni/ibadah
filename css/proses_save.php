<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
include "koneksi.php";
$modal_name = $_POST['modal_name'];
$description = $_POST['description'];
mysqli_query($koneksi,"INSERT INTO modal (modal_name,description) VALUES ('$modal_name','$description')");
header('location:index.php');
?>