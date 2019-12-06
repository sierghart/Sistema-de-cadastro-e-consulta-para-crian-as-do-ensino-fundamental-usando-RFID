<?php
session_start();

///connection
require_once 'db_connect.php';


if (isset($_POST['teste'])) :

    $teste = $_POST['teste'];


    $sql = "SELECT id FROM esp2 WHERE id = '$teste'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :
        echo "existe";

    else :
        $sql = "INSERT INTO esp2 (id) VALUES ('$teste')";
        mysqli_query($connect, $sql);
        echo "colocado";

    endif;

endif;
