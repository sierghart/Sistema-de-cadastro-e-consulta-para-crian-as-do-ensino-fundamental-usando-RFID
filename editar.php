<?php
//conexão
include_once "php_action/db_connect.php";
//Header
include_once 'includes/header.php';

//session
session_start();
//check if an administrator is logged in
if(!isset($_SESSION['logado_adm'])):
    header('Location: login');
endif;


//check if 'id' was passed by GET
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * from alunos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_assoc($resultado);
endif;
?>

<!-- informations for edit -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar aluno </h3>
        <form action="php_action/update" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">

            <div class = "input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
                <label for="idade">Idade</label>
            </div>

            <div class = "input-field col s12">
                <input type="date" name="data" id="data" value="<?php echo date("d/m/Y", strtotime($dados['data_nascimento']));?>">
                <label for="data">Data de nascimento do aluno</label>
            </div>

            <div class = "input-field col s12">
                <input type="text" name="doenças" id="doneças" value="<?php echo $dados['doenças'];?>">
                <label for="doenças">Doenças</label>
            </div>

            <div class = "input-field col s12">
                <input type="text" name="remedios" id="remedios" value="<?php echo $dados['remedios'];?>">
                <label for="remedios">Remédios</label>
            </div>

            <div class = "input-field col s12">
                <input type="text" name="responsavel" id="responsavel" class="validate" 
                 value="<?php echo $dados['nome_responsavel'];?>" data-length="40" maxlength = "40">
                <label for="responsavel">Nome do responsável</label>
            </div>

            <div class = "input-field col s12">
                <input type="number" name="numero_responsavel" id="numero_responsavel" class="validate"
                value="<?php echo $dados['numero_responsavel'];?>" data-length="9" maxlength = "9">
                <label for="numero_responsavel">Número do responsável</label>
            </div>

            <div class = "input-field col s12">
                <input type="text" name="endereço" id="endereço" class="validate"
                 value="<?php echo $dados['endereço'];?>" data-length="40" maxlength = "40">
                <label for="endereço">Endereço e número da casa/apartamento</label>
            </div>

            <div class = "input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
                <label for="email">Email do responsável</label>
            </div>

            

            <button type="submit" name="btn-editar" class="btn green"> Atualizar </button>
            <a href="dados_privados" type="submit" class="btn"> Voltar </a>

        </form>

            

    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>