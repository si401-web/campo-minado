<?php
require "testar_logado.php";
include('conexao.php');
?>
<?php
require "db_models.php";
$title = "Cadastro";
$css = "form.css";
?>
<?php
$userID = $_SESSION["user_id"];

$result_usuario = "SELECT * FROM USER WHERE ID = $userID";
$resultado_usuario = $conn->query($result_usuario);
$row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
?>
<?php
if(isset($_POST['SendCadastro'])){
    $name = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $query = $conn->query("UPDATE USER SET NAME = '$name', BIRTHDAY = '$dataNascimento', CPF = '$cpf', PHONE = '$telefone', EMAIL = '$email', USERNAME = '$usuario', PASSWORD = '$senha' WHERE ID = '$userID'");
    if($query){
        header("Location: editarcadastro.php");
    }
    else{
        echo "Não foi possivel cadastrar";
    }
}
?>
<?php
require "html_inicio.php"
?>
<section>
        <form class="container" id="cadastro-form" method="POST">
        <h2 class="center">Editar Cadastro</h2>
        Nome Completo
        <input class="readonly" type="text" name="nome" value="<?php echo$row_usuario['NAME'];?>" readonly /> 
        Data de Nascimento
        <input type="text" placeholder="00/00/0000" name="dataNascimento" value="<?php echo$row_usuario['BIRTHDAY'];?>" /> 
        CPF
        <input class="readonly" type="text" placeholder="000.000.000-00" name="cpf" readonly value="<?php echo$row_usuario['CPF'];?>" /> 
        Telefone
        <input type="text" placeholder="(xx)xxxxx-xxxx" name="telefone" value="<?php echo$row_usuario['PHONE'];?>" /> 
        E-mail
        <input type="email" placeholder="exemplo@dominio.com" name="email" value="<?php echo$row_usuario['EMAIL'];?>" />
        <br /> 
        Usuário
        <input class="readonly" type="text" name="usuario" readonly value="<?php echo$row_usuario['USERNAME'];?>" />

        <div class="cadastro-campo campo-alerta">
            <label>Senha*</label>
            <input type="password" minlength="6" maxlength="12" name="senha" placeholder="Digite a nova senha" value="<?php echo$row_usuario['PASSWORD'];?>" />
            <span>*Digite de 6 a 12 caracteres</span>
        </div>

        <br />
        <br />

        <div class="center"> <input type="submit" value="Salvar" name="SendCadastro" id="cadastro-form-submit"> </div>
</form>
    
</section>

<?php
require "html_fim.php";
?>