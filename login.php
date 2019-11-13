<?php
//Header
include_once 'includes/header.php';
//mensagem
include_once 'includes/mensagem.php';

unset($_SESSION['logado_adm']);
?>

<form action="php_action/logar" method="POST">

<!-- writing field and button -->
<div class="row container center-align">
<h3>Login</h3>
    <div class="col s12 m6 push-m3">
        
        <div class="input-field col s12">
            <input type="text" placeholder="nome" name="nome" id="nome"  
            autocomplete="off" class="validate" data-length="40" maxlength = "40">
            <label for="nome">Nome</label>
        </div>
        <div class="input-field col s12">
            <input type="password" placeholder="senha" name="senha" id="senha"  autocomplete="off">
            <label for="senha">Senha</label>
        </div>
        <div class="col s12">
            <button type="submit" id="entrar" name="btn-entrar" class="btn green"> Entrar </button>
            <a href="index" id="voltar" class="btn red">Voltar</a>

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
h3{
    position: absolute;
    top: -50%;
    left: 30%;
    transform: translate(-50%, -50%);
}
</style>



<?php
//Footer
include_once 'includes/footer.php';
?>