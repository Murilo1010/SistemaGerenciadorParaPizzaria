<?php include_once ('../include/HeaderSistema.php'); ?>

<?php
 include_once ('../include/ConexaoBanco.php');
 $sql_insertpedido = "INSERT INTO `pedido`(`id_pedido`, `nome_cliente`, `Logradouro`, `Numero`, `Cidade`, `Estado`, `Bairro`, `CEP`, `Situacao`, `id_funcionario`, `Pais` , `Tipo`) SELECT id_pedido,nome_cliente,Logradouro,Numero,Cidade,Estado,Bairro,CEP, Situacao,id_funcionario,Pais,Tipo FROM pedido_temporario";
if ($conexao->query($sql_insertpedido) === TRUE ) {
    echo '
    <a href="../Pedidos/pedidos.php"
    <h4 class="w3-button w3-green w3-center">Dados Registrados Com Sucesso! </h4>
    </a>';
    
    } else {
    echo '
    <a href="../Pedidos/pedidos.php"
    <h4 class="w3-button w3-red w3-center">Erro Ao Adicionar Os Registros! </h4>
    </a>';
    }

if (isset($_POST['btn-finalizar'])) {
    $sql_deletetemp = "DELETE FROM pedido_temporario";
    if ($conexao->query($sql_deletetemp) === TRUE ) {
        echo '
        <h4 class="w3-button w3-green">Tabela Temporaria Limpada com Sucesso! </h4>
        </a>';
        
        } else {
        echo '
        <h4 class="w3-button w3-red">Erro ao Limpar a tabela temporaria! </h4>
        </a>';
        }
}



?>
<?php include_once ('../include/RodapeSistema.php'); ?>