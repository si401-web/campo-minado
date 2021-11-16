<?php
include('conexao.php');
?>

<?php
// redireciona para o login se o usuário não estiver logado
require "testar_logado.php";

// inclue o arquivo que tem as classes para lidar com banco de dados
require "db_models.php";

// variáveis usadas para personalizar html_inicio
$title = "Ranking Global &#127942;";
$css = "table.css";

// passa os dados do php para o onload que irá chamar o javascript
$onload = "criaArray()";

// pega o conteúdo da parte do início do html
require "html_inicio.php";

?>

<section>
    <h2>Ranking</h2>
    <div id="ranking">
        <table id="tabela-padrao">
            <tr>
                <?php
                require "array_ranking.php";
                ?>
            </ul>
        </table>
    </div>
</section>

<?php

// pega o conteúdo da parte do fim do html
require "html_fim.php";

?>