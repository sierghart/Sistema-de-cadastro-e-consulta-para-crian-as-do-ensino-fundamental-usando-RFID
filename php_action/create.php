<?php
//sessão
session_start();
//conexão
require_once 'db_connect.php';
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

//check if the "create" button has been clicked
if (isset($_POST['btn-cadastrar'])) :

    //get information for patient creation
    $nome = clear($_POST['nome']);
    $nascimento = clear($_POST['data']);
    $remedios = clear($_POST['remedios']);
    $endereco = clear($_POST['endereço']);
    $nome_responsavel = clear($_POST['responsavel']);
    $numero_responsavel = clear($_POST['numero_responsavel']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $doencas = clear($_POST['doenças']);
    $sangue = clear($_POST['tipo_sanguineo']);

    if (empty($nome) or empty($nascimento) or empty($endereco) or empty($nome_responsavel) or empty($numero_responsavel) or empty($idade)) :
        $_SESSION['mensagem'] = 'Preencha todos os campos obrigatórios';
        header("Location: ../adicionar");

    else :
        $sql_esp = "SELECT id FROM esp2";
        $resultado_esp = mysqli_query($connect, $sql_esp);

        if (mysqli_num_rows($resultado_esp) > 0) :
            $dados_esp = mysqli_fetch_array($resultado_esp);
            $uid = $dados_esp['id'];
            $sql_esp2 = "SELECT uid FROM alunos WHERE uid = '$uid'";
            $resultado_esp2 = mysqli_query($connect, $sql_esp2);

            if (mysqli_num_rows($resultado_esp2) > 0) :

                $_SESSION['mensagem'] = "pulseira já vinculada a um aluno";
                $sql_esp2 = "TRUNCATE TABLE esp2";
                mysqli_query($connect, $sql_esp2);
                header("Location: ../adicionar");

            else :


                //creates patient with the acquired information
                $sql = "INSERT INTO alunos 
                (nome, email, idade, doenças, remedios, endereço, nome_responsavel, numero_responsavel, data_nascimento, tipo_sanguineo, uid)
                VALUES 
                ('$nome', '$email', '$idade', '$doencas', '$remedios', '$endereco', '$nome_responsavel', '$numero_responsavel', '$nascimento', '$sangue', '$uid')";


                //if all information is correct the patient will be created and QRcode will be generated
                if (mysqli_query($connect, $sql)) :
                    $sql_esp2 = "TRUNCATE TABLE esp2";
                    mysqli_query($connect, $sql_esp2);
                    $_SESSION['mensagem'] = 'Cadastrado com sucesso';
                    $_SESSION['nome'] = $nome;
                    ?>
                    <script>
                        window.open("http://<?php echo $_SERVER['SERVER_NAME']; ?>/escola/painel_administrador", "_parent")
                        window.open("http://<?php echo $_SERVER['SERVER_NAME'];?>/escola/qrcode", "_blank");
                    </script>
                <?php

                //otherwise he will return to the creation page with an error message
                else :
                    $_SESSION['mensagem'] = 'Erro ao cadastrar';
                    header('Location: ../adicionar');
                endif;
            endif;
        else:
            $_SESSION['mensagem'] = "coloque a pulseira na leitora";
            header("Location: ../adicionar.php");
        endif;
    endif;
endif;
?>