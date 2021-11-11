<?php

// Para criar um jogo, precisa ser usado o formulário com POST
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    // Se não for um POST, redireciona para o formulário de nova_partida,
    // para a pessoa criar o jogo novo
    header("Location: nova_partida.php");

    // impede que continue executando o código abaixo
    die();
}


// redireciona para o login se o usuário não estiver logado
require "testar_logado.php";

// pega o usuário logado
$userID = $_SESSION["user_id"];


// pega os dados que vieram do formulário (POST) de nova_partida
$mode = $_POST["modalidade"] == "rivotril" ? "rivotril" : "classica";
$columns = intval($_POST["colunas"]);
$lines = intval($_POST["linhas"]);
$bombs = intval($_POST["bombas"]);


// inclue o arquivo que tem as classes para lidar com banco de dados
require "db_models.php";

// cria o objeto de jogo novo, com os parâmetros escolhidos
$game = new Game();
$game->Mode = $mode;
$game->Columns = $columns;
$game->Lines = $lines;
$game->Bombs = $bombs;

// chama o método que cria o jogo no banco de dados
$game->create($userID);


// variáveis usadas para personalizar html_inicio
$title = "Partida";
$javascript = "jogo.js";
$css = "tabuleiro.css";

// passa os dados do php para o onload que irá chamar o javascript
$onload = "createGame(" . $game->ID . ", '" . $mode . "', " . $columns . ", " . $lines . ", " . $bombs . ")";

// pega o conteúdo da parte do início do html
require "html_inicio.php";

?>

<div id="tempo">
    <span id="decorrido">&nbsp;&nbsp;&nbsp;00:00</span><span id="restante"></span>
</div>

<div id="tabuleiro">
    <table>
        <tr>
            <td id="cell-0-0" onclick="openBlock(0,0)"></td>
        </tr>
    </table>
</div>

<div id="info">
    <span id="qtd">Número de células abertas: 0</span>
    <br />
    <br />
    <span id="modalidade">Modalidade Clássica</span>
    <br />
    <span id="dimensoes">9 x 9 casas</span>
    <span id="bombas">10 bombas</span>
</div>

<aside id="acoes">
    <button id="trapaca" onclick="toggleBombs('X')">Trapaça</button>
</aside>

<?php

// pega o conteúdo da parte do fim do html
require "html_fim.php";

?>
