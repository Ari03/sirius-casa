<?php

include_once ('../comodo.class.php');

$comodo = new Comodo;
//$comodo->controlarLuz(2); // opcoes de parâmetro -> 1 ou 0
$comodo->controleLuzPorRelogio(1);
//$comodo->controlarPortaDaGaragem(1);

echo 'Ação realizada para teste';
?>