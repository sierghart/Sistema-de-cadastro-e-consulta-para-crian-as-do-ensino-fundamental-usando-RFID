<?php
//Header
include_once 'includes/header.php';
//Acaba com todas a sessões
session_start();
session_unset();
session_destroy();
?>

    <div class="row container  center-align">

        <div class="col s12 m6 push-m3">

            <div class="col s6 m6 pull-m3">
                <a href="consulta" class="btn-large waves-effect waves-light blue ">consultar aluno</a>
            </div>

            <div class="col s6 m6 push-m3">
                <a href="login" class="btn-large waves-effect waves-light green ">Entrar</a>
            </div>
        </div>
    </div>

<!--buttons cetralization -->
<style>
.center-align{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

<?php
//Footer
include_once 'includes/footer.php';
?>