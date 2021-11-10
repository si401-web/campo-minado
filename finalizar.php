<?php

// Para finalizar um jogo, precisa ser usado POST
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    // Se não for um POST, redireciona para o formulário de nova_partida,
    // para a pessoa criar o jogo novo
    header("Location: nova_partida.php");

    // impede que continue executando o código abaixo
    die();
}


// inclue o arquivo que tem as classes para lidar com banco de dados
require "db_models.php";


// chama a session do PHP, que controla se o usuário está logado
session_start();

// pega o usuário logado
$userID = $_SESSION["USER_ID"];


// cria o objeto de jogo para ser atualizado, com o resultado
$game = new Game();
$game->ID = $_POST["id"];
$game->Result = $_POST["result"];

// chama o método que salva o resultado do jogo no banco de dados
$game->finish($userID);

?>