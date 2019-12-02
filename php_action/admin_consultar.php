<?php
//conexão
include_once "db_connect.php";


//sessão
session_start();

if (!isset($_SESSION['logado_adm'])) :

    header('Location: login');
endif;

//check if the "consult" button has been clicked
if (isset($_GET['btn-consultar'])) :

    //check if the field has been filled 
    if (empty($_GET['nome'])) :
        $_SESSION['mensagem'] = 'Preencha o campo';
        header('Location: ../consulta.php');
    else :

        //get name for verification in database
        $nome = mysqli_escape_string($connect, $_GET['nome']);

        $sql = "SELECT * FROM alunos WHERE nome = '$nome'";
        $resultado = mysqli_query($connect, $sql);

        //if the patient exists, the results will be shown, otherwise it will return to the consultation page.
        if (mysqli_num_rows($resultado) > 0) :
            $dados = mysqli_fetch_array($resultado);
            mysqli_close($connect);
            $_SESSION['nome'] = $dados['nome'];
            header("Location: ../dados_privados");


        else :
            $_SESSION['mensagem'] = 'Aluno não existe';
            header('Location: ../consulta_admin');
        endif;

    endif;

endif;
