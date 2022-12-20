<?php include_once '../include/HeaderSistema.php'; ?>

 <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
    <p>Essa Página Serve Para Conferir ou Consultar os Dados Do Pedido</p>
 </div>

 <div class="w3-card-4">
<?php
 include_once '../include/ConexaoBanco.php';

 $query_ultimasequencia_INSERT = "SELECT PEDIDO.Tipo AS Tipo, PEDIDO.Situacao AS situacao_pedido,
                                    FUNCIONARIOS.nome AS Funcionario ,
                                    FUNCIONARIOS.id_funcionario AS id_funcionario  
                                    FROM pedido PEDIDO INNER JOIN funcionarios FUNCIONARIOS 
                                    ON PEDIDO.id_funcionario = FUNCIONARIOS.id_funcionario 
                                    WHERE PEDIDO.id_pedido = ".$_GET['id_pedido'] ;

$result_ultimasequencia_INSERT = mysqli_query($conexao,$query_ultimasequencia_INSERT);

while($linha_sequencia = mysqli_fetch_assoc($result_ultimasequencia_INSERT)) {

  $tipo = $linha_sequencia["Tipo"];
  $funcionario = $linha_sequencia["Funcionario"]; 
  $codigofuncionario = $linha_sequencia["id_funcionario"];
  $situacaopedido = $linha_sequencia["situacao_pedido"];
};

?>
  

    <header class="w3-container w3-blue">
        <h4 class="w3-center w3-text-orange" style="font-weight: bold;">Dados Do Pedido Nr: <?php echo $_GET['id_pedido']  ?></h4>
    </header>
    <br>
    <div class="w3-container w3-border">
        <div class="w3-border w3-padding">
            <label  style="font-weight: bold;">Funcionário: </label><label><?php echo strtoupper("$codigofuncionario")." ". strtoupper("$funcionario") ?></label> <br>
        </div>

        <div class="w3-border w3-padding">
            <label  style="font-weight: bold;">Situação Do Pedido: </label><label><?php echo strtoupper($situacaopedido) ?></label><br>
            <label  style="font-weight: bold;">Tipo Do Pedido: </label><label><?php echo strtoupper("$tipo") ?></label> <br>
        </div>
    </div>

    <div class="w3-container w3-border">
                <h4 class="w3-center w3-text-orange" style="font-weight: bold;">Endereço Do Cliente:</h4>

            <div  class="w3-container w3-border w3-padding">
<?php

        echo '    <table class="w3-table-all w3-left w3-centered ">
        <thead class="w3-hoverable"> 
            <tr class="w3-center w3-blue w3-hover-green">
                <th>Seq.</th>
                <th>Pizzas</th>
                <th>Quantidade Total</th>
                <th>Preço Un.</th>
            </tr>
        <thead>
 ';
 
 $sql = "SELECT PEDITEM.SequenciaItem AS 'Seq' ,PRODUTO.sabor AS 'Pizza' ,PEDITEM.Quantidade , PRODUTO.preco AS 'PreçoUN'  FROM pedidoitem PEDITEM 
 INNER JOIN produto PRODUTO ON PEDITEM.id_produto = PRODUTO.id_produto
 WHERE PEDITEM.id_pedido = ".$_GET['id_pedido'] ;

 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {
 echo '<tr>';
 echo '<td>'.$linha['Seq'].'</td>';
 echo '<td>'.$linha['Pizza'].'</td>';
 echo '<td>'.$linha['Quantidade'].'</td>';
 echo '<td>R$ '.$linha['PreçoUN'].'</td>';
 echo '</tr>';
}
echo '
</table>
</div>';


$conexao->close();
?>
            </div>
            <br>
          
       
    <footer class="w3-container w3-blue">
        <h5>Pizzaria Boa Pizza</h5>
    </footer>

</div>

<a href="listagemcozinha.php" class="w3-margin w3-button w3-teal  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-arrow-left w3-xxlarge"></i>Voltar para a página da cozinha</a>





<?php include_once ("../include/RodapeSistema.php"); ?>