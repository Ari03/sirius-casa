<?php

# Sirius - Grupo de Pesquisa
# Autor: Gérley Adriano
# Nome do script: sala_de_estar.php
/*Descrição: Neste script é executado todas as ações comuns a sala de estar

*/

include_once('../comodo.class.php');

$estado = $_POST['estado'];
$sala = new Comodo;
$sala->controleLuz($estado);

?>