<?php
/* require "testar_logado.php"; */
include('conexao.php');
?>
<?php
require "db_models.php";
$css = "form.css";
?>
<?php
    if(isset($_POST['SendCadastro'])){
        $name = $_POST['Nome'];
        $dataNascimento = $_POST['DataNascimento'];
        $cpf = $_POST['CPF'];
        $telefone = $_POST['Telefone'];
        $email = $_POST['Email'];
        $usuario = $_POST['Usuario'];
        $senha = $_POST['Senha'];

        $query = $conn->query("INSERT INTO USER (NAME,BIRTHDAY,CPF,PHONE,EMAIL,USERNAME,PASSWORD) VALUES ('$name','$dataNascimento','$cpf','$telefone','$email','$usuario','$senha')");

        if($query){
            header('location: login.php');
            echo "Cadastro Realizado com Sucesso";
        }
        else{
            echo "Não foi possivel cadastrar";
        }
    }
?>
<?php
$title = "Cadastro";
require "html_inicio.php"
?>
<section>
        <form class="container" id="cadastro-form" method="POST">

            <h2 class="cadastro-titulo">Cadastro</h2>

            <div class="cadastro-campo">
                <label>Nome Completo</label>
                <input type="text" name="Nome" placeholder="Ex: João da Silva" required />
            </div>

            <div class="cadastro-campo">
                <label>Data de Nascimento</label>
                <input type="text" name="DataNascimento" placeholder="0000-00-00" minlength="10" maxlength="10" required  />
            </div>

            <div class="cadastro-campo">
                <label>CPF</label>
                <input type="text" name="CPF" minlength="11" maxlength="11" placeholder="00000000000" required />
            </div>

            <div class="cadastro-campo">
                <label>Telefone</label>
                <input type="text" name="Telefone" placeholder="55912345678" minlength="11" maxlength="11" required/>
            </div>

            <div class="cadastro-campo">
                <label>E-mail</label>
                <input type="email" name="Email" placeholder="exemplo@dominio.com" required />
            </div>

            <div class="cadastro-campo">
                <label>Usuário</label>
                <input type="text" name="Usuario" placeholder="Digite seu nome de usuário" required />
            </div>

            <div class="cadastro-campo campo-alerta">
                <label>Senha*</label>
                <input type="password" name="Senha" minlength="6" maxlength="12" placeholder="Digite sua senha" required />
                <span>*Digite de 6 a 12 caracteres</span>
            </div>

            <br />

            <div class="center"> <input type="submit" value="Cadastrar" name="SendCadastro" id="cadastro-form-submit"> </div>

        </form>

    </section>

<?php
require "html_fim.php";
?>