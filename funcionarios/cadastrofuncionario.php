<?php include_once ("../include/verificaAcesso.php"); ?>
<?php //require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>
<?php

include_once ("../include/ConexaoBanco.php");

$sql_ultimoid = "SELECT MAX(id_funcionario) + 1 AS NOVOUSUARIO FROM funcionarios";
$result_sql_ultimoid = mysqli_query($conexao,$sql_ultimoid);

while($linha = mysqli_fetch_assoc($result_sql_ultimoid)) {

    $ultimoid = $linha["NOVOUSUARIO"];
  };

?>
<a href="../funcionarios/listagemfuncionarios.php" class="w3-display-topleft ">
 <i class="fa fa-arrow-circle-left w3-large w3-blue w3-button w3-xxlarge"></i> 
</a>
<div class="w3-padding w3-content w3-text-grey w3-third w3-margin w3-display-middle">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Cadastro de Funcionários</h1>

 <form action="../funcionarios/cadastrofuncionarioAction.php" class="w3-container" method='post'>
 <label class="w3-text-blue" style="font-weight: bold;">Código</label> 
 <input name="txtIDFuncionario" class="w3-input w3-grey w3-border" value="<?php echo "$ultimoid" ?>" disabled><br>

 <label class="w3-text-blue" style="font-weight: bold;">Nome</label>
 <input name="txtNomeFuncionario" class="w3-input w3-light-grey w3-border"><br>

 <label class="w3-text-blue" style="font-weight: bold;">Data Admissão</label>
 <input name="txtDataAdmissao" type="date" class="w3-input w3-light-grey w3-border"><br>

   <label class="w3-text-blue" style="font-weight: bold;">Cargo</label>
 <select name="txtCargo" class="w3-select w3-light-grey w3-border">
  <option value=""  disabled selected>Selecionar</option>
  <!--<option value="1">GERENTE</option>-->
  <option value="ATENDENTE">ATENDENTE</option>
  <option value="PIZZAIOLO">PIZZAIOLO</option>
  <option value="ENTREGADOR">ENTREGADOR</option>
 </select>
<br>
<br>
 <button name="btnAdd" class="w3-button w3-blue w3-cell w3-round-large w3-right w3-margin-right">
 <i class="w3-xxlarge fa fa-plus-square"></i> Adicionar
 </button>
 </form>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>