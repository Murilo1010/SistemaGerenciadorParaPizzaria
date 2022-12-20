<?php include_once ("../include/HeaderSistema.php"); ?>




<div class="w3-bar w3-blue">
  <button class="w3-bar-item w3-button" onclick="openCity('DadosPedido')">Dados do Pedido</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Endereco')">Endereço(Opcional)</button>
</div>

<div class="w3-padding w3-content w3-text-grey quarter w3-margin w3-display-middle">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Excluir: Nr. Pedido: <?php echo " ".$_GET['id_pedido']?> </h1>
    <form action="../Pedidos/excluirpedidoAction.php" class="w3-container" method='post'>
    <div id="DadosPedido" class="w3-container city">
    <input name="txtnrpedido" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_pedido']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Cliente</label>
    <input name="txtcliente" class="w3-input w3-grey w3-border" disabled value="<?php echo $_GET['Cliente']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Funcionário</label>
    <input  class="w3-input w3-gray w3-border" disabled value="<?php echo $_GET['Funcionario'] ?>">
    <input name="txtidfuncionario" type="hidden" class="w3-input w3-gray w3-border" disabled value="<?php echo $_GET['ID_FUNCIONARIO']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Situação</label>
    <input name="txtsituacao" class="w3-input w3-gray w3-border" disabled value="<?php echo $_GET['Situacao']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Tipo</label>
    <input name="txttipo" class="w3-input w3-gray w3-border" disabled value="<?php echo $_GET["Tipo"] ?>">
   
    </div>
    <div id="Endereco" class="w3-container city" style="display:none">
    <div>
                <label class="w3-text-indigo" style="font-weight: bold;">CEP:</label>
                <input type="text" name="CEP"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['CEP']; ?>">
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Logradouro:</label>
                <input type="text" name="Logradouro" class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Logradouro']; ?>" >
            </div>
            <br>     
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Número:</label>
                <input type="number" name="Numero"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Numero']; ?>">
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Bairro:</label>
                <input type="text" name="Bairro"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Bairro']; ?>" >
            
            </div>
            <br>       
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Cidade:</label>
                <input type="text" name="Cidade"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Cidade']; ?>">  
            </div>
            <br>       
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Estado:</label>
                <input type="text" name="Estado"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Estado']; ?>"> 
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Pais:</label>
                <input type="text" name="Pais"  class="w3-input w3-grey w3-border" disabled value="<?php $_GET['Pais']; ?>">
            </div>

    </div>

    <div class="w3-container   w3-cell w3-cell-bottom " id="botao">
        <button name="btnExcuir" class="w3-button w3-margin w3-button w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-check "></i> Confirmar Exclusão.</button>

        <a href="../Pedidos/pedidos.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i>Cancelar Exclusão</a>
    </div>

    </form>
</div>
<?php include_once ("../include/RodapeSistema.php");  ?>