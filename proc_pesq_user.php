<?php

//conexão
include_once "php_action/db_connect.php";

if (isset($_POST['palavra'])) :

    $nome = mysqli_escape_string($connect, $_POST['palavra']);

    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$nome%' order by nome";
    
else :
    $sql = "SELECT * FROM alunos order by nome";
    
endif;
$resultado = mysqli_query($connect, $sql);
if (mysqli_num_rows($resultado) > 0) :

    $data = '
        
        <table class="striped">
            <thead>
                    <tr>
                    <th>Nome:</th>
                     <th>Nome do responsável:</th>
                    <th>Número do responsável:</th>
                    <th>Idade:</th>
                </tr>
            </thead>
            <tbody>';
    while ($row_usuario = mysqli_fetch_assoc($resultado)) :

        $data .= '
            
                <tr>
                    <td>' . $row_usuario['nome'] . '</td>
                    <td>' . $row_usuario['nome_responsavel'] . '</td>
                    <td>' . $row_usuario['numero_responsavel'] . '</td>
                    <td>' . $row_usuario['idade'] . '</td>
                    <td><a href="php_action/admin_consultar?nome='. $row_usuario['nome'].'&btn-consultar=" class="btn-floating tooltipped blue" data-position="right" data-tooltip="Ver mais"><i class="material-icons">remove_red_eye</i></a></td>
                    


                </tr>
            
                
                ';

    endwhile;
    $data .= '</tbody>
        </table>
        </div>
        </div>';
else :
    echo "nenhum resultado encontrado";


endif;

echo $data;
