<?php


include_once('../comodo.class.php');

$estado = $_POST['cozinha'];
$sala = new Comodo;
$sala->controleLuz($estado);

?>
