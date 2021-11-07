<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Campo Minado | Partida</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Unicamp, Tecnologia, Análise, Desenvolvimento, Sistemas, Programação, Web, SI401, Jogo, Campo Minado" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tabuleiro.css" />
    <script src="js/jogo.js"></script>
</head>

<body onload="createGame()">

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

    <footer>
        SI401 | Programação para a Web
    </footer>
</body>

</html>