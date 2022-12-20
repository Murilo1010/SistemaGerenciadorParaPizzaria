<?php 
    error_reporting(0);
    include_once ("../include/verificaAcesso.php"); 
?>
<?php //require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
 <?php
 include_once ("../include/ConexaoBanco.php");
 
 $sql = "INSERT INTO `funcionarios`(`id_funcionario`, `nome`, `dataadmissao`, `cargo`)
  VALUES ('".$_POST["txtIDFuncionario"]."','".$_POST["txtNomeFuncionario"]."','".$_POST["txtDataAdmissao"]."','".$_POST["txtCargo"]."')";
 
 if ($conexao->query($sql) === TRUE) {
 echo '
 <a href="../funcionarios/listagemfuncionarios.php">
 <h1 class="w3-button w3-blue">Funcionário Cadastrado com sucesso! </h1>
 </a>
 ';
 }else {
 echo '
 <a href="../funcionarios/listagemfuncionarios.php">
 <h1 class="w3-button w3-blue">ERRO! </h1>
 </a>
 ';
 }
 $conexao->close();

 ?>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>