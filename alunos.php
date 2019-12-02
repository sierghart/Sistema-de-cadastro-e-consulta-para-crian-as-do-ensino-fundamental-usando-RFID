<?php
//conexão
include_once "php_action/db_connect.php";
//Header
include_once 'includes/header.php';
//message
include_once "includes/mensagem.php";
//start the session
session_start();

//check if you are logged in as administrator
if(!isset($_SESSION['logado_adm'])):
    header('Location: login');
endif;

?>




<div class="container">
    <div class=" col s12 m6 push-m3">
        <h3 class="light">Alunos
        <a href="painel_administrador" id="sair" class="btn-floating tooltipped red" data-position="right" data-tooltip="Voltar para a página inicial"><i class="material-icons">exit_to_app</i></a>
    </h3>
        
        <form method="POST" id="form-nome" action="">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome" autocomplete="off">
        </form>
        <div class="resultado">

            <table class="striped">

                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Nome do responsável:</th>
                        <th>Número do responsável:</th>
                        <th>Idade:</th>
                    </tr>
                </thead>




                <tbody>

                    
                    
                        <?php



                        $sql = "SELECT * FROM alunos order by nome";
                        $resultado = mysqli_query($connect, $sql);
                        while ($row_usuario = mysqli_fetch_assoc($resultado)) {
                            echo '
                            <tr>
                            <td>' . $row_usuario['nome'] . '</td>
                            <td>' . $row_usuario['nome_responsavel'] . '</td>
                            <td>' . $row_usuario['numero_responsavel'] . '</td>
                            <td>' . $row_usuario['idade'] . '</td>
                            <td><a href="php_action/admin_consultar?nome='. $row_usuario['nome'].'&btn-consultar=" class="btn-floating tooltipped blue" data-position="right" data-tooltip="Ver mais"><i class="material-icons">remove_red_eye</i></a></td>

                           


                        </tr>
                        ';
                        }
                        
                        ?>

                    

                </tbody>

            </table>
        </div>

    </div>
</div>



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="automatico.js"></script>

<?php
//Footer
include_once 'includes/footer.php';
?>