<?php include_once ("../include/verificaAcesso.php"); ?>
<?php//require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>
<?php

include_once ("../include/ConexaoBanco.php");

$sql_ultimoid = "SELECT MAX(id) + 1 AS NOVOUSUARIO FROM usuarios";
$result_sql_ultimoid = mysqli_query($conexao,$sql_ultimoid);

while($linha = mysqli_fetch_assoc($result_sql_ultimoid)) {

    $ultimoid = $linha["NOVOUSUARIO"];
  };

?>
<a href="../Menu/menu.php" class="w3-display-topleft ">
 <i class="fa fa-arrow-circle-left w3-large w3-blue w3-button w3-xxlarge"></i> 
</a>
<div class="w3-padding w3-content w3-text-grey w3-third w3-margin w3-display-middle">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Cadastro de Usuários</h1>

 <form action="cadastrousaurioAction.php" class="w3-container" method='post'>
 <label class="w3-text-blue" style="font-weight: bold;">Código</label> 
 <input name="txtID" class="w3-input w3-grey w3-border" value="<?php echo "$ultimoid" ?>" disabled><br>

 <label class="w3-text-blue" style="font-weight: bold;">Usuário</label>
 <input name="txtUsuario" class="w3-input w3-light-grey w3-border"><br>

 <label class="w3-text-blue" style="font-weight: bold;">Senha</label>
 <input name="txtSenha" class="w3-input w3-light-grey w3-border"><br>

   <label class="w3-text-blue" style="font-weight: bold;">Nivel De Acesso</label>
 <select name="txtNivel" class="w3-select w3-light-grey w3-border">
  <option value=""  disabled selected>Selecionar</option>
  <!--<option value="1">GERENTE</option>-->
  <option value="2">ATENDENTE</option>
  <option value="3">PIZZAIOLO</option>
  <option value="4">ENTREGADOR</option>
 </select>
<br>
<br>
 <button name="btnAdd" class="w3-button w3-blue w3-cell w3-round-large w3-right w3-margin-right">
 <i class="w3-xxlarge fa fa-plus-square"></i> Adicionar
 </button>
 </form>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>