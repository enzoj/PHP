<?php
/**
 * PDO File Doc Comment
 *
 * PHP version 7
 * 
 * @category PDO
 * @package  PHP-Curse
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

    $conn->beginTransaction();

    $stmt = $conn->prepare(
        "DELETE FROM tb_usuarios
        WHERE idusuario = ?"
    );

    $id = 2;

    $stmt->execute(array($id));

    $conn->commit();

    echo "Delete ok!";

?>
