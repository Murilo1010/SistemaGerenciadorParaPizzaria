<?php
    error_reporting(0);
    include_once ('../include/HeaderSistema.php'); 
?>
<script>
/*Função para trocar o action do formulario */
  /* function mudarAction() {
    document.getElementById('btnenviar2').onclick = function() {
      document.getElementById('cadastroitem').action = 'adicionarpedidoAction.php';
  }
 document.getElementById('botaoEnviar').onclick = function() {
      document.getElementById('form').action = '/envio2.php';
  }
  }*/

  function mudarAction()
        {
    document.getElementById('cadastroitem').action = '../Pedidos/adicionarpedidoAction.php';
    document.getElementById('cadastroitem').submit();
}

</script>

<?php 
    include_once ('../include/ConexaoBanco.php');


 

$idfuncionario = $_POST["funcionario"];
$id_pedido = $_POST["NrPedido"];
$cliente = $_POST["clientepedido"];
$situacao = 'Pedido';


//Variavel dos enderecos
$logradouro = $_POST["Logradouro"];
$numero     = $_POST["Numero"];
$bairro     = $_POST["Bairro"];
$cidade     = $_POST["Cidade"];
$estado     = $_POST["Estado"];
$pais       = $_POST["Pais"];
$CEP        = $_POST["CEP"];

//Verificação para saber pelos dados preenchidos se é uma entrega ou o cliente vai comer no local  
//Esse tipo de verificação é para verificar se a string ou numero está vazia
if (!empty($logradouro)) {
    $tipoentrega = "Entrega";
}elseif (!empty($numero )) {
    $tipoentrega = "Entrega";
}elseif (!empty($bairro)) {
    $tipoentrega = "Entrega";
}elseif (!empty($cidade )) {
    $tipoentrega = "Entrega";
}elseif (!empty($estado )) {
    $tipoentrega = "Entrega";
}elseif (!empty($pais )) {
    $tipoentrega = "Entrega";
}elseif (!empty($CEP )) {
    $tipoentrega = "Entrega";
}else {
    $tipoentrega = "Retirada";
};



//Comando para inserir na tabela 
if (isset($_POST['btn-proximapagina'])) {
    
   // $sql_inserttemp = "INSERT INTO `pedido_temporario`(`id_pedido`, `nome_cliente`, 
   // `Logradouro`, `Numero`, `Cidade`, `Estado`, `Bairro`, `CEP`,`id_funcionario`, `Pais`) VALUES ('$id_pedido' , '$cliente' , '$logradouro' , '$numero' , '$cidade' ,'$estado' , '$bairro' , '$CEP' , '$idfuncionario' , '$pais')";
   $sql_inserttemp = "INSERT INTO `pedido_temporario`(`id_pedido`, `nome_cliente`, `Tipo`, `Logradouro`, `Numero`, `Cidade`, `Estado`, `Bairro`, `CEP`, `Situacao`, `id_funcionario`, `Pais`) 
   VALUES ('$id_pedido' , '$cliente' , '$tipoentrega' , '$logradouro' , '$numero' , '$cidade' , '$estado' , '$bairro' , '$CEP' , '$situacao' , '$idfuncionario' , '$pais')"; 
   
    if ($conexao->query($sql_inserttemp) === TRUE ) {
        echo '<p class="w3-button" style="font-size: 0 ;">Dados Cadastrados Com Sucesso na Tabela Temporária!</p>';
    } else {
        echo '<p class="w3-button w3-red" style="font-size: 0 ;">Erro ao Adicionar Na Tabela Temporária </p>';
    }  

}


//Query para buscar o nome do funcionario do pedido para mostrar na tela
 
$query_funcionario_GET = "SELECT nome FROM funcionarios WHERE id_funcionario = '$idfuncionario'";
//$query_funcionario_GET = "SELECT nome FROM funcionarios WHERE id_funcionario = ".$_SESSION['idfuncionario'];
$result_query_funcionario_GET = mysqli_query($conexao,$query_funcionario_GET);

while($linha = mysqli_fetch_assoc($result_query_funcionario_GET)) {

   $nomefuncionario = $linha["nome"];
  };

 $query_produto = "SELECT id_produto , sabor FROM produto;";
 $result_produto = mysqli_query($conexao,$query_produto);

$query_ultimoid = "SELECT MAX(id_pedido) AS ID FROM pedidoitem;";
$result_ultimoid = mysqli_query($conexao,$query_ultimoid);

while($linha = mysqli_fetch_assoc($result_ultimoid)) {

   $ultimoid = $linha["ID"] + 1;
};


$query_ultimasequencia = "SELECT MAX(SequenciaItem) AS sequencia FROM pedidoitem WHERE id_pedido = '$ultimoid'";
$result_ultimasequencia = mysqli_query($conexao,$query_ultimoid);

while($linha_sequencia = mysqli_fetch_assoc($result_ultimasequencia)) {

  $ultimasequencia = $linha_sequencia["sequencia"] + 1;
};

?>



<?PHP 


/*
echo 'oi';


$cookie_funcionario = $nomefuncionario;
$cookie_tipo       = $tipoentrega;

setcookie($cookie_nrpedido, time() + (86400 * 30), "/");

*/
?>
<div class="w3-container w3-border">
   <!-- 
        <label name="NrPedido-label" style="font-size: 20px ; font-weight: bold;">Nr. Pedido: </label><label style="color: green ;font-size: 20px ; font-weight: bold;" class="w3-margin-right"><?php echo $_COOKIE[$cookie_nrpedido] ; ?></label> 
        <label name="cliente-label" style="font-size: 20px ; font-weight: bold;">Cliente: </label> <label style="color: green ;font-size: 20px ; font-weight: bold;" class="w3-margin-right"><?php echo $_SESSION["cliente"]; ?></label> 
        <label name="NrPedido-label" style="font-size: 20px ; font-weight: bold;">Funcionario: </label> <label style="color: green ;font-size: 20px ; font-weight: bold;" class="w3-margin-right"><?php echo $_SESSION["funcionario"]; ?></label> 
        <label name="NrPedido-label" style="font-size: 20px ; font-weight: bold;">Tipo: </label> <label style="color: green ;font-size: 20px ; font-weight: bold;" class="w3-margin-right"><?php echo $_SESSION["tipo"] ; ?></label>     
-->
</div>
<?php 

$sql_selecttemp = "SELECT `id_pedido`, `nome_cliente`,`id_funcionario` FROM `pedido_temporario`";
 $result_temppedido = mysqli_query($conexao,$sql_selecttemp);
while($linha_temp = mysqli_fetch_assoc($result_temppedido)) {

    $nrpedido = $linha_temp["id_pedido"];
    $cliente = $linha_temp["nome_cliente"];
    $funcionario = $linha_temp["id_funcionario"];

}
?>
<!-----Formulario para confirmar o produto---->
<form action="" method="POST">
<div class="w3-container w3-border ">
    <br>
    <!-----Produtos----disabled--->
    <label style="font-weight: bold;" class="w3-margin-left ">Produto:</label>
    <select name="produto" id="produto" class="w3-select w3-border w3-light-green">
        <option value="0"  selected>Selecionar</option>
        <?php 
            while($dados_funcionario = mysqli_fetch_assoc($result_produto)) {
            ?>
            <option value="<?php echo $dados_funcionario['id_produto'] ?>">
                <?php echo $dados_funcionario['sabor'] ?>
            </option>
        <?php 
            }
            ?>
    </select>
    <input type="submit" name="btn-passarid" value="Confirmar Produto" class="w3-right w3-green w3-border w3-btn ">
</div>
</form>


<!--------->




<form action="" id="form" method="POST">
   
<div class="w3-container w3-border">
     <!----
    <label style="font-size: 20px;">Sequência: </label><label style="font-size: 20px ; color: green ;" class="w3-margin-right"><?php //echo "$ultimasequencia"; ?></label> 
---->
</div>

<br>

<!-----Produto Escolhido---->
<?php  $Produtoselecionado = $_POST["produto"]; ?>

<?php 
$query_informacoes_produto = "SELECT sabor,preco FROM produto WHERE id_produto = '$Produtoselecionado'";
$result_informacoes_produto = mysqli_query($conexao,$query_informacoes_produto );

while($linha_produto = mysqli_fetch_assoc($result_informacoes_produto)) {

  $sabor = $linha_produto["sabor"];
  $preco = $linha_produto["preco"];
};
?>

<div class="w3-container w3-border w3-padding w3-light-green">
     <label style="font-weight: bold ;" class="w3-margin-left">Produto Escolhido: </label><label style="color: green ;font-size: 20px ; font-weight: bold;" class="w3-margin-right"><?php echo $sabor; ?></label> 
     <input type="hidden" name="Produtoselecionado" value="<?php echo "$sabor"; ?>">
</div>
<br>
</form>




<form action="../Pedidos/adicionaItemAction.php" id="cadastroitem" method="POST">
<div > 
        <input type="hidden" name="NrPedido" value="<?php echo "$nrpedido"; ?>"> <!----Nr Pedido------>
        
        <input type="hidden" name="cliente" value="<?php echo "$cliente" ?>"> <!----Cliente------>
        
        <input type="hidden" name="funcionario" value="<?php echo "$funcionario"; ?>"> <!----Funcionário------>
       
      <!-- <input type="hidden" name="tipo" value="<?php// echo "$tipoentrega"; ?>"> -----><!----Tipo Entrega------>

       <input type="hidden" name="idproduto" value="<?php echo $_POST["produto"]; ?>">
        <input type="hidden" name="nomeproduto" value="<?php echo "$sabor" ?>">
        <input type="hidden" name="precoundoproduto" value="<?php echo "$preco_input" ?>">
        <input type="hidden" name="extrasdoproduto" value="<?php echo "$extra_input " ?>">
        <input type="hidden" name="quantidadeproduto" value="<?php echo "$quantidade_input" ?>">
        <input type="hidden" name="sequencia" value="<?php echo "$ultimasequencia" ?>">

</div>
<div class="w3-border   w3-padding w3-light-green" >
        <label style="font-weight: bold ;" id="quant" class="w3-margin-left w3-padding">Quantidade: </label> <input type="number" name="quantidadeitem" placeholder="Digite a quantidade">      

        <label style="font-weight: bold ;" id="precoun" class="w3-margin-left w3-padding">Preço:</label> <input type="number" name="precoun" placeholder="" value="<?php echo "$preco" ?>">      
    </div>
    <br>
    <div class="w3-border  w3-padding w3-light-green">
        <label style="font-weight: bold ;" class="w3-margin-left w3-padding">Extras: </label><input type="text" name="extras" placeholder="Ex:Borda Recheada">
    </div>



    <div class="w3-border w3-green">
        <!----
        <label style="font-weight: bold ;">Total dos itens</label> <input type="number" id="total" name="totaldoitem" value=""> <?php// echo "$totalitem_input" ?>"
        ---->
    </div>
    <br>
    <br>
    <input id="btnenviar2" name="btnenviar2" type="button" value="Revisão Pedido" style="border-radius: 12px; background-color: green ;" onClick="mudarAction()" />
  <input type="submit" name="btn-adicionar" style="border-radius: 12px;background-color:  green ;" value="Adicionar item no pedido">
</form>



  

<?php include_once ('../include/RodapeSistema.php'); ?>