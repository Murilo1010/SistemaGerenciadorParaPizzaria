<?php include_once ("../include/HeaderSistema.php");    ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
 <?php
   include_once ("../include/ConexaoBanco.php");
 $sql = "UPDATE `usuarios` SET `usuario`='".$_POST['txtusuario']."',`senha`='".$_POST['txtsenha']."' WHERE id =". $_POST['txtidusuario'].";";
 
 if ($conexao->query($sql) === TRUE) {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
 <h1 class="w3-button w3-teal">Usuário Atualizado com sucesso! </h1>
 </a>
 ';
 //$id = mysqli_insert_id($conexao);
 
 } else {
 echo '
 <a href="../Usuarios/listagemusuarios.php">
 <h1 class="w3-button w3-teal">ERRO! </h1>
 </a>
 ';
 }
 $conexao->close();
 ?>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>