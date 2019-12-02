<?php
//Header
include_once 'includes/header.php';
//start the session
session_start();

//message
include_once "includes/mensagem.php";

//check if you are logged in as administrator
if(!isset($_SESSION['logado_adm'])):
    header('Location: login');
endif;

?>
        <h2 id="painel">Painel administrativo</h2>
    <div class="row container  center-align">

        

        <div class="col s12 m6 push-m3">

            <div class="col s6 m6 pull-m3">
                <a href="alunos" class="btn-large waves-effect waves-light blue ">alunos</a>
            </div>

            <div class="col s6 m6 push-m3">
                <a href="adicionar" class="btn-large waves-effect waves-light green ">Cadastrar aluno</a>
            </div>

            <div class="col s6 m6 push-s3 push-m3">
                <a href="login" id ="sair" class="btn-large waves-effect waves-light red ">Sair</a>
            </div>
        </div>

        
    </div>

<!--cetralization field -->
<style>
.center-align{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}
#sair{
    position: absolute;
    top: 10000%;
    left: 50%;
    transform: translate(-50%, -50%);
}
#painel{
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>


<?php
//Footer
include_once 'includes/footer.php';
?>