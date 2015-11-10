<?php

require_once "../comodo.class.php";

$estado = $_POST['quarto'];
$sala = new Comodo;
$sala->controleLuz($estado);



?>