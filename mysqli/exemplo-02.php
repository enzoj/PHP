<?php 

$conn = new mysqli("localhost", "administrador", "123mudar", "dbphp7");

if ($conn->connect_error) {
	echo "Error: " . $conn->connetc_error;
}

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY des_login");

$data = array();

//while($row = $result->fetch_assoc()){
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	array_push($data, $row);
}

echo json_encode($data)

 ?>