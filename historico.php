<?php

require "testar_logado.php";

$title = "Histórico";
$css = "table.css";

require "html_inicio.php";

?>

    <section class="historico-secao">
        <h2 class="historico-titulo">Histórico</h2>

        <div>
            <table id="tabela-padrao">
                <tr> 
                    <th>Nome</th>
                    <th>Tempo da partida</th>
                    <th>Dimensões</th>
                    <th>Modo de jogo</th>
                    <th>N° de bombas</th>
                    <th>Resultado </th>
                    <th>Data e hora da disputa</th>
                </tr>
<?php

require "conexao.php";

$dadosPartidas = $conn->query("SELECT * FROM GAME WHERE USER_ID = " . $_SESSION["user_id"])->fetchAll();
$arrayUsers = $conn->query("SELECT * FROM USER WHERE ID = " . $_SESSION["user_id"])->fetchAll();

usort($dadosPartidas, "sortByDate");

$qtd = count($dadosPartidas);

for ($i = 0; $i < $qtd; $i++) {  
    $dataInicio = date_sub(new DateTime($dadosPartidas[$i][7]),date_interval_create_from_date_string("3 hours"));
    $dadosPartidas[$i][6] = substr($dadosPartidas[$i][6], 11, 8);
    $dadosPartidas[$i][6] = strtotime($dadosPartidas[$i][6]);
    $dadosPartidas[$i][7] = substr($dadosPartidas[$i][7], 11, 8);
    $dadosPartidas[$i][7] = strtotime($dadosPartidas[$i][7]);
    $tempoPartida = adjustTime($dadosPartidas[$i][7] - $dadosPartidas[$i][6]);
    $nome;

    for ($j = 0; $j < count($arrayUsers); $j++) {
        if($dadosPartidas[$i][8] == $arrayUsers[$j][0]){
            $nome = $arrayUsers[$j][6];
        }
    }

    echo "<tr>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" . $tempoPartida . "</td>";
    echo "<td>" . $dadosPartidas[$i]["LINES"] . "x" . $dadosPartidas[$i]["COLUMNS"] . "</td>";
    echo "<td>" . $dadosPartidas[$i]["MODE"] . "</td>";
    echo "<td>" . $dadosPartidas[$i]["BOMBS"] . "</td>";
    echo "<td>" . $dadosPartidas[$i]["RESULT"] . "</td>";
    echo "<td>" . date_format($dataInicio, 'd/m/Y H:i') . "</td>"; 
    echo "</tr>";
}

function convertTime($vet){
    for ($i = 0; $i < count($vet); $i++) {
        $vet[$i][6] = substr($vet[$i][6], 11, 8);
        $vet[$i][6] = strtotime($vet[$i][6]);
        $vet[$i][7] = substr($vet[$i][7], 11, 8);
        $vet[$i][7] = strtotime($vet[$i][7]);
    }

    return $vet;
}

function adjustTime($number){
    $seconds = $number % 60;
    if ($seconds < 10) {
        $seconds = "0" + $seconds;
    }

    $minutes = ($number - $seconds) / 60;
    if ($minutes < 10) {
        $minutes = "0" + $minutes;
    }

    return str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
}

function sortByDate($a, $b){
    if ($a[6] === $b[6]) {
        return 0;
    } else {
        return ($a[6] > $b[6]) ? -1 : 1;
    }
}

?>

            </table>
        </div>
    </section>

<?php

require "html_fim.php";

?>