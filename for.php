<form>
	<input type="text" name="nome">
	<input type="date" name="dataNascimento">
	<input type="submit" value="Inserir">
</form>


<?php 

if(isset($_GET)){

	foreach ($_GET as $key => $value) {
		echo "Nome do campo: " . $key . "<br>";
		echo "Valor do campo: " . $value . "<hr>";
	}
}

?>




<?php
/*
echo "<select>";

for ($i=date("Y"); $i > date("Y")-100 ; $i--) { 
	echo '<option value="'.$i.'">'.$i.'</option>';
}

echo "</select>";
*/
 ?>