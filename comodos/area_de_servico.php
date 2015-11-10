<?php
include_once('../comodo.class.php');

$estado = $_POST['area'];
$sala = new Comodo;
$sala->controleLuz($estado);

?>
