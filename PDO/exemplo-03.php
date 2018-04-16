<?php
/**
 * MyClass File Doc Comment
 *
 * PHP version 7
 * 
 * @category MyClass
 * @package  MyPackage
 * @author   Enzo Teixeira <enzo.teixeira@sedur.ba.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

    $conn = new PDO(
        "sqlsrv:Database=dbphp7;
        server=localhost\SQLEXPRESS;
        ConnectionPooling=0",
        null, null
    );
    $stmt = $conn->prepare(
        "INSERT INTO tb_usuarios(deslogin, dessenha)
        VALUES(:LOGIN, :PASSWORD)"
    );

    $login = "jao"; $senha = "senhadejao";

    $stmt->bindParam(":LOGIN", $login); $stmt->bindParam(":PASSWORD", $senha);
    
    $stmt->execute();

    echo "Inserido ok!";

?>
