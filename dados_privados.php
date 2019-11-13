<?php
//connection
include_once "php_action/db_connect.php";
//Header
include_once 'includes/header.php';
//message
include_once "includes/mensagem.php";
//session
session_start();
//check if an administrator is logged in
if(!isset($_SESSION['logado_adm'])):
    header('Location: login');
endif;

?>

<!-- database query for information -->
<?php
    $nome = $_SESSION['nome'];
    $sql = "SELECT * FROM pacientes WHERE nome = '$nome'";
    $resultado = mysqli_query($connect, $sql);

    if(mysqli_num_rows($resultado) > 0):
    $dados = mysqli_fetch_array($resultado);
?>

<form action="dados_privados" method="GET">
<div class="row">
    <div class="col s12 m6 push-m3">

        <h3 class="light">Aluno 
        <a href="editar?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a> 
        <a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></h3>
            
            
        
         <!-- Modal Structure for delet patient-->
         <div id="modal<?php echo $dados['id'];?>" class="modal">
                            <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse aluno?</p>
                            </div>
                            <div class="modal-footer">
                            

                            <form action="php_action/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                                <button type="submit" name=btn-deletar class="btn red">Sim, quero deletar</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>   
                            </form>    

                            </div>
                        </div>
        
        <!-- table with the informations -->                        
        <table class="striped">
            <tbody>
                

                <tr>
                    <th>Nome:</th>
                    <td><?php echo $dados['nome'];?></td>
                </tr>
                    
                <tr>
                    <th>Sobre Nome:</th>
                    <td><?php echo $dados['sobrenome'];?></td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td><?php echo $dados['email'];?></td>
                </tr>

                <tr>
                    <th>Idade:</th>
                    <td><?php echo $dados['idade'];?></td>
                </tr>

                <tr>
                    <th>Tipo sanguíneo:</th>
                    <td><?php echo $dados['tipo_sanguineo'];?></td>
                </tr>

                <tr>
                    <th>Doenças:</th>
                    <td><?php echo $dados['doenças'];?></td>
                </tr>

                <tr>
                    <th>Remédios:</th>
                    <td><?php echo $dados['remedios'];?></td>
                </tr>

                <tr>
                    <th>Data de nascimento:</th>
                    <td><?php echo date("d/m/Y", strtotime($dados['data_nascimento']));?></td>
                </tr>

                <tr>
                    <th>Nome do responsável:</th>
                    <td><?php echo $dados['nome_responsavel'];?></td>
                </tr>
                    
                <tr>
                    <th>Número do responsável:</th>
                    <td><?php echo $dados['numero_responsavel'];?></td>
                </tr>

                <tr>
                    <th>Endereço:</th>
                    <td><?php echo $dados['endereço'];?></td>
                </tr>
               
                <?php 
                endif;
                ?>
                
            </tbody>

        </table>
        <br>
        <a href="consulta_admin" class="btn red">Sair</a>
        

    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>