<?php include_once ("../include/verificaAcesso.php"); ?>
<?php// require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>

<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" id="eProfissional">
 <?php
    include_once ("../include/ConexaoBanco.php");

$sql = "DELETE FROM usuarios WHERE id = '".$_POST['txtidusuario'] ."';";
 if ($conexao->query($sql) === TRUE) {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
    <h1 class="w3-button w3-teal">Usuário Excluido Com Sucesso! </h1>
 </a>
 ';
 } else {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
    <h1 class="w3-button w3-teal">Erro Ao Excluir o Usuário </h1>
 </a>
 ';
 }

 $conexao->close();
 ?>
</div>

<?php include_once ("../include/RodapeSistema.php"); ?>