<?php
 
//database connection
$servername = "localhost";
$username = "edmilson";
$password = "ed041299";
$db_name = "crud";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, 'utf8');




date_default_timezone_set('America/Sao_Paulo');
 

if (isset($_POST['teste'])) :

    $teste = $_POST['teste'];


    $sql = "SELECT nome FROM alunos WHERE uid = '$teste'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :
        $dados = mysqli_fetch_array($resultado);
        Logger($dados['nome'].' entrou');
        echo 'bem vindo '.$dados['nome'];

    else :
        echo "não cadastrado";

    endif;

endif;





function Logger($msg){

$data = date("d-m-y");
$hora = date("H:i:s");

 
//Nome do arquivo:
$arquivo = "Logger_$data.txt";
 
//Texto a ser impresso no log:
$texto = "[$hora]> $msg \n";
 
$manipular = fopen("$arquivo", "a+b");
fwrite($manipular, $texto);
fclose($manipular);
 
}





