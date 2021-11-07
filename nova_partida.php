<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Campo Minado | Nova partida</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Unicamp, Tecnologia, Análise, Desenvolvimento, Sistemas, Programação, Web, SI401, Jogo, Campo Minado" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <script src="js/nova_partida.js"></script>
</head>

<body>

    <header>
        <h1 title="Campo Minado">
            Camp&#x1f4a3; Minad&#x1f4a3;
        </h1>
        <nav>
            <ul id="menu">
                <li>
                    <a href="nova_partida.php">Partida</a>
                </li>
                <li>
                    <a href="historico.html">Histórico</a>
                </li>
                <li>
                    <a href="ranking.html">Ranking</a>
                </li>
                <li>
                    <a href="editarCadastro.html">Editar cadastro</a>
                </li>
                <li>
                    <a href="login.html">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <section class="container">
        <form name="partida" onsubmit="return criarPartida()" action="jogo.php" method="GET">
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

    <footer>
        SI401 | Programação para a Web
    </footer>
</body>

</html>