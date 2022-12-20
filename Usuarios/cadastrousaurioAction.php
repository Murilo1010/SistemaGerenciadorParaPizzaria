<?php include_once ("../include/verificaAcesso.php"); ?>
<?php //require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
 <?php
 include_once ("../include/ConexaoBanco.php");
 
 $sql = "INSERT INTO `usuarios` (`usuario`, `senha`)
 VALUES ('".$_POST['txtUsuario']."', '".$_POST['txtSenha']."')";
 
 if ($conexao->query($sql) === TRUE) {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
 <h1 class="w3-button w3-blue">Usuário Cadastrado com sucesso! </h1>
 </a>
 ';
 }else {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
 <h1 class="w3-button w3-blue">ERRO! </h1>
 </a>
 ';
 }
 $conexao->close();

 ?>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>