<?php
//sessão
session_start();
//conexão
require_once 'db_connect.php';
//function to avoid 'xss' and 'sql ijection'
    function clear($input){
        global $connect;
        //sql
        $var = mysqli_escape_string($connect, $input);
        //xss
        $var = htmlspecialchars($var);
        return $var;
    }

//check if the "create" button has been clicked
if(isset($_POST['btn-cadastrar'])):

    //get information for patient creation
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $nascimento = clear($_POST['data']);
    $remedios = clear($_POST['remedios']);
    $endereco = clear($_POST['endereço']);
    $nome_responsavel = clear($_POST['responsavel']);
    $numero_responsavel = clear($_POST['numero_responsavel']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $doencas = clear($_POST['doenças']);
    $sangue = clear($_POST['tipo_sanguineo']);
    
    
    
    //creates patient with the acquired information
    $sql = "INSERT INTO pacientes 
    (nome, sobrenome, email, idade, doenças, remedios, endereço, nome_responsavel, numero_responsavel, data_nascimento, tipo_sanguineo)
     VALUES 
     ('$nome', '$sobrenome', '$email', '$idade', '$doencas', '$remedios', '$endereco', '$nome_responsavel', '$numero_responsavel', '$nascimento', '$sangue')";


//if all information is correct the patient will be created and QRcode will be generated
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = 'Cadastrado com sucesso';
        $_SESSION['nome'] = $nome;
        ?>
        <script>
            window.open("http://localhost/crud/28-crud/painel_administrador", "_parent")
            window.open("http://localhost/crud/28-crud/qrcode", "_blank");
        </script>
        <?php
    
    //otherwise he will return to the creation page with an error message
    else:
        $_SESSION['mensagem'] = 'Erro ao cadastrar';
        header('Location: ../adicionar');
    endif;

endif;
?>