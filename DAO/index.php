<?php

require_once("config.php");

/* Traz um usuáio passando o id
$user = new User();
$user->loadById(3);
echo $user;
*/

/* Traz todos os usuários
$lista = User::getList();
echo json_encode($lista);
*/

/*Pesquisa os usuários com o conteúdo passado
$search = User::search("en");
echo json_encode($search);
*/

/*Retorna info do user after logged in
$user = new User();
$user->login("enzo", "senhafraca");
echo $user;
*/


$user = new User();
$user->login('ERALDO', 'senha');
// $user->select();
echo $user;


/*
$user = new User();
$user->loadById(1);
$user->update('Enzo', '2');
echo $user;
*/
?>