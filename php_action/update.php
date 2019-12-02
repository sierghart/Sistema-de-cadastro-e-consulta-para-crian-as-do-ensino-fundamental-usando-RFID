<?php
//session
session_start();
//connection
require_once 'db_connect.php';
//function to avoid 'xss' and 'sql ijection
function clear($input)
{
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}

//check if the "edit" button has been clicked
if (isset($_POST['btn-editar'])) :

    //get information for patient edition
    $nome = clear($_POST['nome']);
    $nascimento = clear($_POST['data']);
    $remedios = clear($_POST['remedios']);
    $endereco = clear($_POST['endereço']);
    $nome_responsavel = clear($_POST['responsavel']);
    $numero_responsavel = clear($_POST['numero_responsavel']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $doencas = clear($_POST['doenças']);

    $id = clear($_POST['id']);


    //if everything is correct put the information in the database
    $sql = "UPDATE alunos SET nome ='$nome', email = '$email'
    , idade = '$idade', doenças = '$doencas', remedios = '$remedios', endereço = '$endereco',
    nome_responsavel = '$nome_responsavel', numero_responsavel = '$numero_responsavel', data_nascimento = '$nascimento'
     WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = 'Atualizado com sucesso';
        header('Location: ../alunos');
    else :
        $_SESSION['mensagem'] = 'Erro ao Atualizar';
        header('Location: ../dados_privados');
    endif;

endif;
