<?php
//connection
require_once 'db_connect.php';
//session
session_start();

//function to avoid 'xss' and 'sql ijection'
function clear($input)
{
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}

//check if the "login" button has been clicked
if (isset($_POST['btn-entrar'])) :

    //get the name and password
    $nome = clear($_POST['nome']);
    $senha = clear($_POST['senha']);

    $senha = md5($senha);

    ////check if the fields has been filled 
    if (empty($nome) or empty($senha)) :
        $_SESSION['mensagem'] = 'O campo login/senha precisa ser preenchido';
        header('Location: ../login');

    else :

        //check if the information is correct
        $sql = "SELECT nome, senha FROM administrador WHERE nome = '$nome' AND senha = '$senha'";
        $resultado = mysqli_query($connect, $sql);

        if (mysqli_num_rows($resultado) > 0) :
            $_SESSION['logado_adm'] = true;
            header('Location: ../painel_administrador');
        else :
            $_SESSION['mensagem'] = "email ou senha incorretos";
            header('Location: ../login');
        endif;
    endif;
endif;
