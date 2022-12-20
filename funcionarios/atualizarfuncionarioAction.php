<?php  include_once ("../include/HeaderSistema.php");    ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
 <?php
   include_once ("../include/ConexaoBanco.php");
  // $sitaucao = ''''.$_POST["cmbsituacao"].'''';

   $sql = "UPDATE funcionarios SET nome ='".$_POST["txtnomefuncionario"]."',`dataadmissao`='".$_POST["txtDataAdmissao"]."',`cargo`= '".$_POST["txtcargo"]."' WHERE `id_funcionario`= ".$_POST["txtidfuncionario"];
  
         
  //$sql = "UPDATE pedido SET situacao = '".$_POST["cmbsituacao"]."' WHERE id_pedido =".$_POST["txtidpedido"].";";
 //echo "$sql";
 if ($conexao->query($sql) === TRUE) {
  echo '
  <a href="listagemfuncionarios.php">
  <h1 class="w3-button w3-teal">Cadastro do Funcionario Atualizado com sucesso! </h1>
  </a>
  ';
  //$id = mysqli_insert_id($conexao);
  
  } else {
  echo '
  <a href="listagemfuncionarios.php">
  <h1 class="w3-button w3-teal">ERRO! </h1>
  </a>
  ';
  }
  $conexao->close();
  ?>
 </div>
 <?php include_once ("../include/RodapeSistema.php"); ?>