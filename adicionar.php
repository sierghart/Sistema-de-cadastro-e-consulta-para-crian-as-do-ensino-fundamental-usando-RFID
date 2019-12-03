<?php
//Header
include_once 'includes/header.php';
//message
include_once "includes/mensagem.php";
//inicia sessão
session_start();


?>

<!-- inputs for write the informations -->
<div class="row container">
    <div class=" col s12 m6 push-m3">
        <h3 class="light"> Novo Aluno </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" class="validate" autocomplete="off" data-length="60" maxlength="60">
                <label for="nome">Nome completo</label>
            </div>

            <div class="input-field col s12">
                <input type="number" name="idade" id="idade" class="validate" autocomplete="off" data-length="3" maxlength="3" onkeyPress="if(this.value.length==3) return false;">
                <label for="idade">Idade do Aluno</label>
            </div>

            <div class="input-field col s12">
                <input type="date" name="data" id="data" class="validate" autocomplete="off">
                <label for="data">Data de nascimento do Aluno</label>
            </div>


            <!-- Modal Structure for choice the blood-->
            <div class="input-field col s12">
                <select name="tipo_sanguineo">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <label>Tipo saguíneo</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="doenças" id="doneças" autocomplete="off">
                <label for="doenças">O Aluno sofre de alguma doença?(opcional)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="remedios" id="remedios" autocomplete="off">
                <label for="remedios">Quais remédios o aluno toma?(opcional)</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="responsavel" id="responsavel" class="validate" autocomplete="off" data-length="40" maxlength="40">
                <label for="responsavel">Nome completo do responsável</label>
            </div>

            <div class="input-field col s12">
                <input type="number" name="numero_responsavel" id="numero_responsavel" class="validate" autocomplete="off" data-length="9" maxlength="9" onkeyPress="if(this.value.length==9) return false;">
                <label for="numero_responsavel">Número do responsável</label>
                <span class="helper-text" data-error="número invalido"></span>
            </div>

            <div class="input-field col s12">
                <input type="text" name="endereço" id="endereço" class="validate" autocomplete="off" data-length="40" maxlength="40">
                <label for="endereço">Endereço e número da casa/apartamento</label>
            </div>

            <div class="input-field col s12">
                <input type="email" name="email" id="email" class="validate" autocomplete="off" data-length="40" maxlength="40">
                <label for="email">Email do responsavel(opcional)</label>
                <span class="helper-text" data-error="Email inválido" data-success="Email válido"></span>

            </div>


            <button data-target="modal1" class="btn green accent-4 modal-trigger">Cadastrar</button>

            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>AVISOS</h4>
                    <p>
                        <li style="font-size:110%"><b>Verifique se todos os dados estão corretss</b></li>
                        <li style="font-size:110%"><b>Após verificar os dados, coloque o cartão na leitora e clique em "finalizar"</b></li>
                    </p>
                </div>
                <div class="modal-footer">
                <button type="submit" name=btn-cadastrar class="btn green accent-4">Finalizar</button>
                </div>
            </div>

            <a href="painel_administrador" type="submit" class="btn"> Voltar </a>

        </form>





    </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>