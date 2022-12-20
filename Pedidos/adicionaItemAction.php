<?php include_once ('../include/HeaderSistema.php'); ?>

<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
 <?php
    include_once ('../include/ConexaoBanco.php');


    $query_ultimasequencia_INSERT = "SELECT MAX(SequenciaItem) AS sequencia FROM pedidoitem WHERE id_pedido = ".$_POST['NrPedido'];
$result_ultimasequencia_INSERT = mysqli_query($conexao,$query_ultimasequencia_INSERT);

while($linha_sequencia = mysqli_fetch_assoc($result_ultimasequencia_INSERT)) {

  $ultimasequencia = $linha_sequencia["sequencia"] + 1;
};


$sql = "INSERT INTO pedidoitem (id_pedido,SequenciaItem,id_produto,Quantidade,Extras,precoUn) VALUES ('".$_POST['NrPedido']."' , '".$ultimasequencia."' ,'".$_POST['idproduto']."' , '".$_POST['quantidadeitem']."' , '".$_POST['extras']."' , '".$_POST['precoun']."')";

if ($conexao->query($sql) === TRUE ) {
    echo '
    <a href="../Pedidos/itenspedido.php">
    <h1 class="w3-button w3-green w3-center">Itens Salvos Com Sucesso! </h1>
    </a>
    ';
    
    } else {
    echo '
    <a href="../Pedidos/itenspedido.php">
    <h1 class="w3-button w3-red w3-center">Erro Ao Salvar Os Itens No Pedido! </h1>
    </a>
    ';
    }


    $conexao->close();
   
 ?>
</div>
<?php include_once ('../include/RodapeSistema.php'); ?>