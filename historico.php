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

$query = "SELECT u.NAME, g.START, g.END, g.COLUMNS, g.LINES, g.MODE, g.BOMBS, g.RESULT FROM user u INNER JOIN game g ON u.ID = g.USER_ID WHERE u.ID = " . $_SESSION['user_id'];
$historico = $conn->query($query)->fetchAll();

$qtd = count($historico); 
for ($i = 0; $i < $qtd; $i++) {    
    $dataInicio = (new DateTime($historico[$i]["START"]))->format('d/m/Y H:i');
    $dataFim = $historico[$i]["END"];
    $tipoDataFim = gettype($dataFim);
    $subtrHoras = (strtotime($dataFim) - strtotime($historico[$i]["START"])) - 3600;

    if($tipoDataFim == "NULL"){
        $tempoPartida = "Data inválida";
    } else {
        $tempoPartida = date('H:i:s', $subtrHoras);
    }

    echo "<tr>";
    echo "<td>" . $historico[$i]["NAME"] . "</td>";
    echo "<td>" . $tempoPartida . "</td>";
    echo "<td>" . $historico[$i]["LINES"] . "x" . $historico[$i]["COLUMNS"] . "</td>";
    echo "<td>" . $historico[$i]["MODE"] . "</td>";
    echo "<td>" . $historico[$i]["BOMBS"] . "</td>";
    echo "<td>" . $historico[$i]["RESULT"] . "</td>";
    echo "<td>" . $dataInicio . "</td>"; 
    echo "</tr>";
}

?>

            </table>
        </div>
    </section>

<?php

require "html_fim.php";

?>