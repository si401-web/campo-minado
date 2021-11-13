<?php
session_start();
ob_start();
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Campo Minado | Login</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="Unicamp, Tecnologia, Análise, Desenvolvimento, Sistemas, Programação, Web, SI401, Jogo, Campo Minado" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">

</head>

<body>
    <header>
        <h1 title="Campo Minado">
            Camp&#x1f4a3; Minad&#x1f4a3;
        </h1>
    </header>

    <section class="container login-secao">
        <h2>Entre no Campo Minado</h2>
        <br />
        <form class="form" id="login-form" method="POST">
            <label for="username"><b>Usuário</b></label>
            <input type="text" placeholder="Digite seu nome de usuário" name="nomeUsuario" id="username" required>
            <label for="password"><b>Senha</b></label>
            <input type="password" placeholder="Digite sua senha" name="senha" id="password" required>

            <div class="center"> <input type="submit" value="Entrar" name="SendLogin" id="login-form-submit"> </div>

        </form>

        <span class="cad">Ainda não tem conta? <a href="cadastro.html">Faça seu cadastro.</a></span>

        <br />
        <br />
        <p id="login-error-msg">Usuário/senha inválido. Tente novamente. </p>

    </section>

    <footer>
        SI401 | Programação para a Web
    </footer>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['SendLogin'])){
        //var_dump($dados);
        $query_usuario = "SELECT * FROM USER WHERE USERNAME =:nomeUsuario  LIMIT 1";
        $result_usuario = $conn-> prepare($query_usuario);
        $result_usuario->bindParam(':nomeUsuario', $dados['nomeUsuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if($dados['senha'] == $row_usuario['PASSWORD']){
                $_SESSION['user_id'] = $row_usuario['ID'];
                header("Location: nova_partida.php");
            }else{ ?>
                <script>
                    document.getElementById("login-error-msg").style.opacity = 1;
                </script>
    <?php   }
        } else{ ?>
            <script>
                    document.getElementById("login-error-msg").style.opacity = 1;
            </script>
    <?php }
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    // '".$dados['nomeUsuario']."'
    ?>

</body>
</html>