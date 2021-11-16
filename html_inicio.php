<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Campo Minado | <?php echo $title ?></title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Unicamp, Tecnologia, Análise, Desenvolvimento, Sistemas, Programação, Web, SI401, Jogo, Campo Minado" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/<?php echo $css ?>" />
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <?php if (isset($javascript)) { ?>
        <script src="js/<?php echo $javascript ?>"></script>
    <?php } ?>
</head>

<body onload="<?php if (isset($onload)) { echo $onload; } ?>">

    <header>
        <h1 title="Campo Minado">
            Camp&#x1f4a3; Minad&#x1f4a3;
        </h1>
        <?php if (isset($_SESSION["user_id"])) { ?>
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
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
    </header>
