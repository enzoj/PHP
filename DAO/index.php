<?php

require_once("config.php");

$sql = new SQL(
"sqlsrv:Database=dbphp7;
server=localhost\SQLEXPRESS;
ConnectionPooling=0, null, null");

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);

?>