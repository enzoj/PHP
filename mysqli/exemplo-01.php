<?php 

$conn = new mysqli("localhost", "administrador", "123mudar", "dbphp7");

if ($conn->connect_error) {
	echo "Error: " . $conn->connetc_error;
}

$stmt = $conn->prepare("INSERT INTO tb_usuarios (des_login, des_senha) VALUES(?,?)");

$login = "user";
$pass = "12345";

$stmt->bind_param("ss", $login, $pass);

$stmt->execute();

$login = "root";
$pass = "rootpass";

$stmt->execute();

 ?>