<?php

// redireciona para o login se o usuário não estiver logado
require "testar_logado.php";

// variáveis usadas para personalizar html_inicio
$title = "Nova Partida";
$javascript = "nova_partida.js";
$css = "form.css";

// pega o conteúdo da parte do início do html
require "html_inicio.php";

?>

<section class="container">
    <form name="partida" onsubmit="return criarPartida()" action="jogo.php" method="POST">
        <h2 class="center">Nova partida</h2>

        <hr />
        <h3>Modalidade</h3>
        <p class="tab">
            <input type="radio" id="modalidade_classica" name="modalidade" value="classica" checked required />
            <label for="modalidade_classica">Clássica</label>
            <input type="radio" id="modalidade_rivotril" name="modalidade" value="rivotril" />
            <label for="modalidade_rivotril">Rivotril</label>
        </p>

        <hr />

        <h3>Dimensões</h3>
        <p class="texto col-half center">
            <label for="colunas">Colunas</label>
            <input class="center" type="number" id="colunas" name="colunas" value="9" required min="1" max="50" />
        </p>
        <p class="texto col-half center">
            <label for="linhas">Linhas</label>
            <input class="center" type="number" id="linhas" name="linhas" value="9" required min="1" max="50" />
        </p>

        <hr />

        <h3>Bombas</h3>
        <p class="texto">
            <label for="bombas">Quantidade</label>
            <input type="number" id="bombas" name="bombas" value="10" required min="0" />
        </p>

        <hr />

        <div class="center">
            <button type="submit">Iniciar</button>
        </div>
    </form>
</section>

<?php

// pega o conteúdo da parte do fim do html
require "html_fim.php";

?>
