<?php

$title = "Partida";
$javascript = "jogo.js";
$css = "tabuleiro.css";

// pega os dados que vieram do formulário de nova_partida
$mode = $_POST["modalidade"] == "rivotril" ? "rivotril" : "classica";
$columns = intval($_POST["colunas"]);
$lines = intval($_POST["linhas"]);
$bombs = intval($_POST["bombas"]);

require "db_models.php";

$game = new Game();
$game->Mode = $mode;
$game->Columns = $columns;
$game->Lines = $lines;
$game->Bombs = $bombs;
$game->create();

$onload = "createGame('" . $mode . "', " . $columns . ", " . $lines . ", " . $bombs . ")";

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

require "html_fim.php";

?>
