<?php


echo ("Teste");
echo "Numero lido: ";
echo $_REQUEST["numero"];

$conexaoArduino = fopen("ttyUSB0" , "w");
fwrite($conexaoArduino, $_REQUEST["numero"]);
fclose($conexaoArduino);

?>