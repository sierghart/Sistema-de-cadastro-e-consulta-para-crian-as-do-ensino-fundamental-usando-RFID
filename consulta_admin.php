<?php
//Header
include_once 'includes/header.php';
//mensagem
include_once 'includes/mensagem.php';

unset($_SESSION['nome']);

//check if the session 'logado_adm' exist
if(!isset($_SESSION['logado_adm'])):

    header('Location: login');
endif;

?>

<form action="php_action/admin_consultar" method="GET">

<!-- writing field and button -->
<div class="row container center-align">
    <div class="col s12 m6 push-m3">
        <div class="input-field col s12">
            <input type="text" placeholder="Nome" name="nome" id="nome"  autocomplete="off" class="validate" data-length="15" maxlength = "15">
            <label for="nome">Nome completo</label>
        </div>
        <div class="col s12">
            <button type="submit" name="btn-consultar" class="btn green"> Consultar </button>
            <a href="painel_administrador" id="voltar" class="btn">Voltar</a>
        </div>


    </div>



</div>

<!--field cetralization -->
<style>
.center-align{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}

</style>



<?php
//Footer
include_once 'includes/footer.php';
?>