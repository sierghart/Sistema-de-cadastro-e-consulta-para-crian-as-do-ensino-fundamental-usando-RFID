<?php
//connection
include_once "php_action/db_connect.php";
//Header
include_once 'includes/header.php';
//session
session_start();
//check if a query has been made
if (!isset($_SESSION['nome'])) :
    header('Location: consulta');
endif;

?>
<!-- database query for information -->
<form action="dados" method="GET">
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light"> Aluno </h3>
            <table class="striped">
                <tbody>
                    <?php
                    $nome = $_SESSION['nome'];
                    $sql = "SELECT * FROM pacientes WHERE nome = '$nome'";
                    $resultado = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($resultado) > 0) :
                        $dados = mysqli_fetch_array($resultado)

                        ?>

                        <!-- table with the informations -->
                        <tr>
                            <th>Nome:</th>
                            <td><?php echo $dados['nome']; ?></td>
                        </tr>

                        <tr>
                            <th>Sobre Nome:</th>
                            <td><?php echo $dados['sobrenome']; ?></td>
                        </tr>

                        <tr>
                            <th>Email:</th>
                            <td><?php echo $dados['email']; ?></td>
                        </tr>

                        <tr>
                            <th>Idade:</th>
                            <td><?php echo $dados['idade']; ?></td>
                        </tr>

                        <tr>
                            <th>Tipo sanguíneo:</th>
                            <td><?php echo $dados['tipo_sanguineo']; ?></td>
                        </tr>

                    <?php
                    endif;
                    ?>

                </tbody>

            </table>
            <br>
            <a href="consulta" class="btn waves-effect waves-light">Votlar</a>


        </div>
    </div>
    <?php
    //Footer
    include_once 'includes/footer.php';
    ?>