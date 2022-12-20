<?php include_once ('../include/HeaderSistema.php'); ?>

<?php
 include_once ('../include/ConexaoBanco.php');
 $query_pediodtemporario = "SELECT * FROM `pedido_temporario` ;";
 $result_pediodtemporario = mysqli_query($conexao,$query_pediodtemporario);
 
 while($linha = mysqli_fetch_assoc($result_pediodtemporario)) {
 
   $nrpedido_temp = $linha["id_pedido"] ;
 };



$sql_deleteitens = "DELETE FROM `pedidoitem` WHERE id_pedido = ".$nrpedido_temp;
if ($conexao->query($sql_deleteitens) === TRUE ) {
    echo '
    <a href="../Pedidos/pedidos.php"
    <h4 class="w3-button w3-green w3-center">Itens do pedido deletado com sucesso! </h4>
    </a>';
    
    } else {
    echo '
    <a href="../Pedidos/pedidos.php"
    <h4 class="w3-button w3-red w3-center">Erro Ao Limpar itens do pedido! </h4>
    </a>';
    
    }




if (isset($_POST['btn-cancelar'])) {
    $sql_deletetemp = "DELETE FROM pedido_temporario";
    if ($conexao->query($sql_deletetemp) === TRUE ) {
        echo '
        <h4 class="w3-button w3-green w3-center">Tabela Temporaria Limpada com Sucesso! </h4>
        ';
        
        } else {
        echo '
        <h4 class="w3-button w3-red w3-center">ERRO ao Limpar a tabela temporaria! </h4>
        ';
        }
}
?>
<?php include_once ('../include/RodapeSistema.php'); ?>