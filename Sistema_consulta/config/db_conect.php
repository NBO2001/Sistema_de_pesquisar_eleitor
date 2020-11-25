<?php
$bd = 'db_sistema_consulta';
$us = 'root';
$sn = "";

$pdo = new PDO( 'mysql:host=localhost;dbname='.$bd, $us, $sn );
$pdo -> query("SET NAMES UTF8");

/*
$nome_arquivo = "con_db";
//echo $nome_arquivo;
$login = "OII\n";
$senha = "hasghsdg";
$sql = $login . $senha;
$handle = fopen($nome_arquivo . '.txt', 'w+');
fwrite($handle, $sql);
fclose($handle);
*/

?>