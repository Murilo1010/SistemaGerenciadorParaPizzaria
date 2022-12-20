<?php include_once ('../include/HeaderSistema.php'); ?>
<script>
function mudarActionCancelar()
        {
  document.getElementById('pedidogeral').action = '../Pedidos/CancelarPedidoAction.php';
    document.getElementById('pedidogeral').submit();
}

function mudarActionAtualizar()
        {
  document.getElementById('pedidogeral').action = '../Pedidos/atualizarpedidoAction.php';
  document.getElementById('pedidogeral').submit();
}

</script>
<?php 
    include_once ('../include/ConexaoBanco.php'); 
    $query_pediodtemporario = "SELECT * FROM `pedido_temporario` ;";
    $result_pediodtemporario = mysqli_query($conexao,$query_pediodtemporario);
    
    while($linha = mysqli_fetch_assoc($result_pediodtemporario)) {
    
      $nrpedido_temp = $linha["id_pedido"] ;
      $cliente_temp = $linha["nome_cliente"] ;
      $funcionario_temp = $linha["id_funcionario"] ;
      $desconto_temp = $linha["Desconto"] ;
      $logradouro_temp = $linha["Logradouro"] ;
      $numero_temp = $linha["Numero"] ;
      $cidade_temp = $linha["Cidade"] ;
      $estado_temp = $linha["Estado"] ;
      $bairro_temp = $linha["Bairro"] ;
      $cep_temp = $linha["CEP"] ;
      $situacao_temp = $linha["Situacao"] ;
      $pais_temp = $linha["Pais"] ;
      $tipo_temp = $linha["Tipo"];
    };

   // $cliente = $_POST['cliente'];
   // $idfuncionario = $_POST['funcionario'];
 //   $tipo = $_POST['tipo'];
   // $idfuncionario = $_COOKIE["CookieFUNCIONARIO"];
    //$cliente = $_COOKIE["CookieCLIENTE"];

    $query_funcionario_GET = "SELECT nome FROM funcionarios WHERE id_funcionario = ".$funcionario_temp;
    $result_query_funcionario_GET = mysqli_query($conexao,$query_funcionario_GET);

    while($linha = mysqli_fetch_assoc($result_query_funcionario_GET)) {

    $nomefuncionario = $linha["nome"];
  };
?>
<div class="w3-container">
<form action="../Pedidos/ConcluirPedidoAction.php" method="POST" id="pedidogeral">
    <!--------Nr.Pedido--->
    <div class="w3-container w3-border">
        <h4 style="font-weight: bold ;">Nr.Pedido: <?php echo $nrpedido_temp  ?> </h4>
        <input type="hidden" name="nrpedidoAction" value="<?php echo $nrpedido_temp ?>">
    </div>
    <!-------Cliente------>
    <div class="w3-container w3-border">
        <h4 style="font-weight: bold ;">Cliente: <?php echo  $cliente_temp   ?> </h4>
        <input type="hidden" name="clienteAction" value="<?php echo $cliente_temp ?>">

    </div>
    <!-------Funcionario------>
    <div class="w3-container w3-border">
        <h4 style="font-weight: bold ;">Funcionário: <?php echo $nomefuncionario  ?> </h4>
        <input type="hidden" name="idfuncionarioAction" value="<?php echo  $funcionario_temp ?>">

    </div>
    <!-------Tipo--------->
    <div class="w3-container w3-border">
        <h4 style="font-weight: bold ;">Tipo: <?php echo $tipo_temp  ?> </h4>
    </div>
    <!-------Situação--------->
    <div class="w3-container w3-border">
        <h4 style="font-weight: bold ;">Situação: <?php echo $situacao_temp  ?> </h4>
    </div>
    <!-------Itens------>
    <div class="w3-container w3-border">

        <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
        <h5 class="w3-center w3-blue w3-round-large w3-margin">Itens</h5>
        <br>
        <table class="w3-table-all w3-left w3-centered ">
            <thead class="w3-hoverable"> 
                <tr class="w3-center w3-blue w3-hover-green">
                    <th>Sequencia</th>
                    <th>Produto</th>
                    <th>Preco Un</th>
                    <th>Quantidade</th>
                    <th>Extras</th>
                    <th>Total</th>
                </tr>
            <thead>  
    </div>
    <?php
        $sql = "SELECT PEDIDOITEM.SequenciaItem,PRODUTO.sabor,
        PEDIDOITEM.precoUn,PEDIDOITEM.Quantidade,PEDIDOITEM.Extras,(PEDIDOITEM.precoUn * PEDIDOITEM.Quantidade) AS Total
        FROM pedidoitem PEDIDOITEM
        INNER JOIN produto PRODUTO ON PEDIDOITEM.id_produto = PRODUTO.id_produto
        WHERE PEDIDOITEM.id_pedido = '$nrpedido_temp'";

        $resultado = $conexao->query($sql);
        if($resultado != null)
        foreach($resultado as $linha) {

            $precoUncorrigido = str_replace(".",",",$linha['precoUn']); 
            $totalItemcorrigido = str_replace(".",",",$linha['Total']); 

        echo '<tr>';
            echo '<td>'.$linha['SequenciaItem'].'</td>';
            echo '<td>'.$linha['sabor'].'</td>';
            echo '<td>R$ '.$precoUncorrigido.'</td>';
            echo '<td>'.$linha['Quantidade'].'</td>';
            echo '<td>'.$linha['Extras'].'</td>';
            echo '<td>R$ '.$totalItemcorrigido.'</td>';
        echo '</tr>';
        }
        echo '
        </table>
        </div>';

    
    
    ?>

    <!-------Total e Desconto------>
    <?php
    $sql_total = "SELECT  SUM((Quantidade * precoUn)) AS Total 
                  FROM pedidoitem WHERE id_pedido = '$nrpedido_temp'";
    $result_sql_total = mysqli_query($conexao,$sql_total);
    while($linha = mysqli_fetch_assoc($result_sql_total)) {
         $totalpedido = $linha["Total"];
    };
    
    $totalpedidocorrigido = str_replace(".",",",$totalpedido); 

    ?>
    <div class="w3-container w3-border">
       <!-- <h4 style="font-weight: bold ;">Desconto(Opcional):</h4><input type="number" name="descontoAction" value="">-------->

        <h4 style="font-weight: bold ;">Total: <?php echo 'R$ '.$totalpedidocorrigido  ?> </h4><input type="hidden" name="totalpedidoAction" value="<?php echo "$totalpedido" ?>">
    </div>

    <input type="submit" id="btn-cancelar" class="w3-red" name="btn-cancelar" value="Cancelar Pedido" onClick="mudarActionCancelar()" />
    <button onclick="location.href='itenspedido.php'" class="w3-blue" type="button">Adicionar Itens</button>
    <input type="submit" class="w3-green" name="btn-finalizar" value="Finalizar Pedido">

</div>
</form>




<?php include_once ('../include/RodapeSistema.php'); ?>