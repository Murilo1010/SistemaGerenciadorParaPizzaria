<?php include_once '../include/HeaderSistema.php'; ?>
<?php 
session_start();
include_once ('../include/ConexaoBanco.php'); // Conexão com Banco De Dados


//Comando Para o Ultimo Nr.Pedido Cadastrado no Banco De Dados
$query_ultimoid = "SELECT MAX(id_pedido) AS ID FROM pedido;";
$result_ultimoid = mysqli_query($conexao,$query_ultimoid);

while($linha = mysqli_fetch_assoc($result_ultimoid)) {

  $ultimoid = $linha["ID"] + 1;
};


$query_funcionarios = "SELECT id_funcionario,nome FROM funcionarios;";
$result_funcionario = mysqli_query($conexao,$query_funcionarios);

?>


<div class="w3-bar w3-blue w3-margin-bottom">
  <button class="w3-bar-item w3-button"><a href="../Menu/menu.php" class=""> <i class="fa fa-arrow-circle-left w3-bar-item w3-large w3-teal w3-large"></i> </a></button>
  <button class="w3-bar-item w3-button" onclick="openCity('DadosPedido')">Dados do Pedido</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Endereco')">Endereço(Opcional)</button>
</div>
<!--Botão para voltar para o menu-->

   



<form action="../Pedidos/itenspedido.php" method="post">
<div id="DadosPedido" class="w3-container city">
    <!--Número do Pedido--->
    <br>
    <div class="w3-container w3-border w3-light-green">
        
        <label name="NrPedido-label"  style="font-size: 20px ; font-weight: bold;">Nr. Pedido: <?php echo "$ultimoid" ?></label> <input type="hidden" name="NrPedido" value="<?php echo "$ultimoid" ?>">
    </div>
    <br>
    <!-----Cliente---->
    <label name="cliente-label" style="font-weight: bold;" >Cliente: </label> <input type="text" name="clientepedido" placeholder="Digite o nome do cliente" class="w3-input w3-border">
    <br>
    <!-----Funcionario----->
    <label style="font-weight: bold;">Funcionário:</label>
        <select name="funcionario" id="funcionario" class="w3-select w3-border">
            <option value="" disabled selected>Selecionar</option>
            <?php 
                while($dados_funcionario = mysqli_fetch_assoc($result_funcionario)) {
                ?>
                <option value="<?php echo $dados_funcionario['id_funcionario'] ?>">
                    <?php echo $dados_funcionario['nome'] ?>
                </option>
            <?php 
                }
                ?>
        </select>
    <br>
    <br>
     
</div>

<!-----Aba Endereço----->
<div id="Endereco" class="w3-container city" style="display:none">
        <!-----Endereço------>
        <div>
            <label style="font-weight: bold;">CEP:</label>
            <input type="text" name="CEP"  class="w3-input  w3-border" >
        </div>
        <br>
        <div>
            <label style="font-weight: bold;">Logradouro:</label>
            <input type="text" name="Logradouro"  class="w3-input  w3-border" >
        </div>
        <br>     
        <div>
            <label style="font-weight: bold;">Número:</label>
            <input type="number" name="Numero"  class="w3-input  w3-border" >
        </div>
        <br>
        <div>
            <label style="font-weight: bold;">Bairro:</label>
            <input type="text" name="Bairro"  class="w3-input  w3-border" >
           
        </div>
        <br>       
        <div>
            <label style="font-weight: bold;">Cidade:</label>
            <input type="text" name="Cidade"  class="w3-input  w3-border" >  
        </div>
        <br>       
        <div>
            <label style="font-weight: bold;">Estado:</label>
            <input type="text" name="Estado"  class="w3-input  w3-border" > 
        </div>
        <br>
        <div>
            <label style="font-weight: bold;">Pais:</label>
            <input type="text" name="Pais"  class="w3-input  w3-border" >
        </div>
    
</div>
         <br>
         <br> 
        <div class="w3-container">      
      <input type="submit" name="btn-proximapagina" value="Proxima Página" class="w3-right w3-green w3-border w3-btn ">
        </div>
</form>

<?php 



?>


<?php include_once ('../include/RodapeSistema.php'); ?>