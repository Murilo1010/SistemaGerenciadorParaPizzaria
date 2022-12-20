<?php  include_once ("../include/verificaAcesso.php"); ?>
<?php include_once '../Menu/headercozinha.php' ?>

<a href="menu.php" class="w3-display-topleft ">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-large"></i> 
</a>



 <?php
    include_once '../include/ConexaoBanco.php';

 echo '
 <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Listagem Cozinha</h1>
 <p style="color:red;" ;>Obs: Só aparecerão os pedidos que estão com as situações Pedido e Em Andamento</p>
<br>
    <table class="w3-table-all w3-left w3-centered ">
        <thead class="w3-hoverable"> 
            <tr class="w3-center w3-blue w3-hover-green">
                <th>Nr.Pedido</th>
                <th>Pizzas</th>
                <th>Quantidade Total</th>
                <th>Situacao do Item</th>
                <th>Atualizar</th>
                <th>Detalhes</th>
            </tr>
        <thead>
 ';
 
$sql = "SELECT PEDIDOS.id_pedido AS 'Nr.Pedido' , 
        PRODUTO.sabor AS 'Pizzas', 
        sum(PEDITEM.Quantidade) AS 'QuantidadeTotal', 
        PEDITEM.situacao_item AS 'Situacao',
        PEDITEM.SequenciaItem AS 'SeqItem' 
        FROM pedido PEDIDOS 
        INNER JOIN pedidoitem PEDITEM ON PEDIDOS.id_pedido = PEDITEM.id_pedido 
        INNER JOIN produto PRODUTO ON PEDITEM.id_produto = PRODUTO.id_produto 
        WHERE PEDIDOS.Situacao = 'Pedido' OR PEDIDOS.Situacao = 'Em Andamento' 
        GROUP by PEDIDOS.id_pedido, PRODUTO.sabor, PEDITEM.situacao_item, PEDITEM.SequenciaItem";


 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {

 echo '<tr class="w3-text-black">
 <td>'.$linha['Nr.Pedido'].'</td>
  <td>'.$linha['Pizzas'].'</td>
 <td>'.$linha['QuantidadeTotal'].'</td>
 <td>'.$linha['Situacao'].'</td>
 <td><a href="atualizapedidocozinha.php?id_pedido='.$linha['Nr.Pedido'].'&SeqItem='.$linha['SeqItem'].'&Qtd='.$linha['QuantidadeTotal'].'&Sabor='.$linha['Pizzas'].'&situacao_item='.$linha['Situacao'].'"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td></td>
  
 <td><a href="detalhespedidoscozinha.php?id_pedido='.$linha['Nr.Pedido'].'"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';
 //echo '<td><a href="confirmacaosenha.php?id_usuario='.$linha['id'].'&usuario='.$linha['usuario'].'&acesso='.$linha['TipoAcesso'].'&botao=detalhar"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';

 echo '</tr>';
 }
 echo '
 </table>
 </div>';


 $conexao->close();
 ?>
 </div>
</body>
</html>


<?php include_once '../include/RodapeSistema.php' ?>