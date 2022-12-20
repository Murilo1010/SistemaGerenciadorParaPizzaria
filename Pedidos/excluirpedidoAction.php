<?php include_once ("../include/HeaderSistema.php"); ?>

<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" id="eProfissional">
 <?php
    include_once ("../include/ConexaoBanco.php");

$sql = "DELETE FROM pedido WHERE id_pedido =  '".$_POST['txtnrpedido'] ."';";
 if ($conexao->query($sql) === TRUE) {
 echo '
 <a href="../Pedidos/pedidos.php">
    <h1 class="w3-button w3-teal">Pedido Excluido Com Sucesso! </h1>
 </a>
 ';
 } else {
 echo '
 <a href="../Pedidos/pedidos.php">
    <h1 class="w3-button w3-teal">Erro Ao Excluir o Pedido </h1>
 </a>
 ';
 }

if(isset($_POST['btnExcuir'])) {
   $sql_limpatemporaria = "DELETE FROM pedidoitem WHERE id_pedido = '".$_POST['txtnrpedido'] ."';";
   if ($conexao->query($sql_limpatemporaria) === TRUE) {
      echo '
      <a href="../Pedidos/pedidos.php">
         <h1 class="w3-button w3-teal">Itens Do Pedido Excluido Com Sucesso! </h1>
      </a>
      ';
      } else {
      echo '
      <a href="../Pedidos/pedidos.php">
         <h1 class="w3-button w3-teal">Erro Ao Excluir Os Itens Do Pedido </h1>
      </a>
      ';
      }
     
}


 $conexao->close();
 ?>
</div>

<?php include_once ("../include/RodapeSistema.php"); ?>