<?php

# Sirius - Grupo de Pesquisa
# Autor: Gérley Adriano
# Nome do script: icomodo.class.php
/* Descrição: Este script tem como objetivo descrever um padrão de métodos a serem seguidos
  por outras classes que implementarem esta interface
 */

interface iComodo {

    public function controlarLuz($estado);

    public function controleLuzPorRelogio($estado);

    public function controlarPortaDaGaragem($estado);

    public function controlarPersiana();
}

?>