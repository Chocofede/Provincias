<?php 
require_once('php/provincias/modelo.php');
$Provincias = new Provincias();
$value=$_GET['term'];
$listado = $Provincias->lista($value);
echo json_encode($listado);

 ?>