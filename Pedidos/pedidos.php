<?php 
include_once ("../include/verificaAcesso.php"); 
require_once ("../include/HeaderSistema.php"); ?>

<!--Botão para voltar para o menu-->
<a href="../Menu/menu.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-large"></i> 
</a>

 <?php
    require_once '../include/ConexaoBanco.php';
 echo '
 <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Listagem dos pedidos</h1>
<a href="../Pedidos/cadastropedidos.php"><button class="w3-right  btn-adicionar"><i class="fa fa-check" aria-hidden="true"></i> Novo Pedido
</button></a>
<br>
    <table class="w3-table-all w3-left w3-centered ">
        <thead class="w3-hoverable"> 
            <tr class="w3-center w3-blue w3-hover-green">
                <th>Nr. Pedido</th>
                <th>Funcionário</th>
                <th>Cliente</th>
                <th >Situação</th>
                <th>Excluir</th>
                <th>Atualizar</th>
                <th>Detalhes</th>
            </tr>
        <thead>
 ';
 
 $sql = "SELECT PEDIDO.id_pedido AS NrPedido,
 PEDIDO.nome_cliente AS CLIENTES,
 PEDIDO.id_funcionario AS ID_FUNCIONARIO,
 FUNCIONARIOS.nome AS FUNCIONARIOS,
 PEDIDO.Situacao,
 PEDIDO.Tipo,
 PEDIDO.Logradouro,
 PEDIDO.Numero,
 PEDIDO.Cidade,
 PEDIDO.Estado,
 PEDIDO.Bairro,
 PEDIDO.CEP,
 PEDIDO.Pais
FROM pedido PEDIDO
INNER JOIN funcionarios FUNCIONARIOS ON PEDIDO.id_funcionario = FUNCIONARIOS.id_funcionario
ORDER BY NrPedido ASC
"; 
 
 
 
/* "SELECT PEDIDO.id_pedido AS NrPedido,
        CLIENTE.nome AS Cliente,
        FUNCIONARIOS.nome AS Funcionario,
        CLIENTE.Celular,
        CLIENTE.Telefone_Fixo AS TelefoneFixo,
        PEDIDO.Desconto,
        PEDIDO.TotalPedido AS Total,
        PEDIDO.Situacao
        FROM pedido PEDIDO 
        INNER JOIN cliente CLIENTE ON PEDIDO.id_cliente = CLIENTE.id_cliente
        INNER JOIN funcionarios FUNCIONARIOS ON PEDIDO.id_funcionario = FUNCIONARIOS.id_funcionario";*/

 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {
 echo '<tr>';
 echo '<td>'.$linha['NrPedido'].'</td>';
 echo '<td>'.$linha['FUNCIONARIOS'].'</td>';
 echo '<td>'.$linha['CLIENTES'].'</td>';

 //echo '<td>'.$linha['Desconto'].'</td>';
 //echo '<td>'.$linha['Total'].'</td>';
 echo '<td width="400px">'.$linha['Situacao'].'</td>';
 echo '<td><a href="../Pedidos/excluirpedido.php?id_pedido='.$linha['NrPedido'].'&Funcionario='.$linha['FUNCIONARIOS'].'&id_funcionario='.$linha['ID_FUNCIONARIO'].'&Cliente='.$linha['CLIENTES'].'&Situacao='.$linha['Situacao'].'&Tipo='.$linha['Tipo'].'&Logradouro='.$linha['Logradouro'].'&Numero='.$linha['Numero'].'&Cidade='.$linha['Cidade'].'&Estado='.$linha['Estado'].'&Bairro='.$linha['Bairro'].'&CEP='.$linha['CEP'].'&Pais='.$linha['Pais'].'"><i class="fa fa-user-times w3-large w3-text-teal"></i> </a></td></td>';
 echo '<td><a href="../Pedidos/atualizarpedido.php?id_pedido='.$linha['NrPedido'].'&Funcionario='.$linha['FUNCIONARIOS'].'&id_funcionario='.$linha['ID_FUNCIONARIO'].'&Cliente='.$linha['CLIENTES'].'&Situacao='.$linha['Situacao'].'&Tipo='.$linha['Tipo'].'&Logradouro='.$linha['Logradouro'].'&Numero='.$linha['Numero'].'&Cidade='.$linha['Cidade'].'&Estado='.$linha['Estado'].'&Bairro='.$linha['Bairro'].'&CEP='.$linha['CEP'].'&Pais='.$linha['Pais'].'"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td></td>';
 echo '<td><a href="../Pedidos/detalhepedido.php?id_pedido='.$linha['NrPedido'].'&Funcionario='.$linha['FUNCIONARIOS'].'&id_funcionario='.$linha['ID_FUNCIONARIO'].'&Cliente='.$linha['CLIENTES'].'&Situacao='.$linha['Situacao'].'&Tipo='.$linha['Tipo'].'&Logradouro='.$linha['Logradouro'].'&Numero='.$linha['Numero'].'&Cidade='.$linha['Cidade'].'&Estado='.$linha['Estado'].'&Bairro='.$linha['Bairro'].'&CEP='.$linha['CEP'].'&Pais='.$linha['Pais'].'"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';

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


<?php require_once ("../include/RodapeSistema.php"); ?>

<!---------
 //echo '<td>'.$linha['Celular'].'</td>';
 //echo '<td>'.$linha['TelefoneFixo'].'</td>';
 ------>