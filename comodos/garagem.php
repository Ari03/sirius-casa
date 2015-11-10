<?php

include_once('../comodo.class.php');

$estado = $_POST['garagem'];
$sala = new Comodo;
$sala->controleLuz($estado);

?>
