<?php include_once ("../include/HeaderSistema.php"); ?>
<?PHP include_once ("../include/ConexaoBanco.php"); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
 <?php
  
//$sql = "UPDATE pedido SET nome = '".$_POST['txtNome']."', apelido = '".
//$_POST['txtApelido']."',
//email='".$_POST['txtEmail']."' WHERE idamigo =". $_POST['txtID'].";";

//,Tipo='".$_POST['txttipo']."'


//Entrega
//Retirada


$sql = "UPDATE pedidoitem SET situacao_item = '".$_POST['situacao']."' 
WHERE id_pedido =". $_POST['txtnrpedido']." AND SequenciaItem = ". $_POST['SeqItem'].";";


 if ($conexao->query($sql) === TRUE) {

 echo '
 <a href="../Menu/listagemcozinha.php">
 <h1 class="w3-button w3-green">Dados Do Pedido Atualizado Com Sucesso! </h1>
 </a>
 ';
 $id = mysqli_insert_id($conexao);
 
 } else {

 echo '
 <a href="../Menu/listagemcozinha.php">
 <h1 class="w3-button w3-red">Erro Ao Atualizar Os Dados Do Pedido! </h1>
 </a>
 ';
 }


 $conexao->close();


 ?>
</div>
<?php include_once ("../include/RodapeSistema.php"); ?>