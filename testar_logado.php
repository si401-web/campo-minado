<?
// chama a session do PHP, que controla se o usuário está logado
session_start();

// Testa se existe usuário logado
if (!isset($_SESSION["user_id"])) {
    // Se não existir, redireciona para o login
    header("Location: login.php");

    // impede que continue executando o código abaixo
    die();
}
?>
