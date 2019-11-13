<?php
//session
session_start();

//connection
require_once 'db_connect.php';

//check if the "delet" button has been clicked
if (isset($_POST['btn-deletar'])) :

    //delete patient with specific ID

    $id = mysqli_escape_string($connect, $_POST['id']);



    $sql = "DELETE FROM pacientes WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = 'Deletado com sucesso';
        header('Location: ../pacientes');
    else :
        $_SESSION['mensagem'] = 'Erro ao deletar';
        header('Location: ../pacientes');
    endif;

endif;
