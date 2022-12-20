<?php include_once ("../include/HeaderSistema.php"); 




?>

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
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Atualizar: Nr. Pedido: <?php echo " ".$_GET['id_pedido']?> </h1>
    <form action="../Pedidos/atualizarpedidoAction.php" class="w3-container" method='post'>
    <div id="DadosPedido" class="w3-container city">
    <input name="txtnrpedido" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_pedido']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Cliente</label>
    <input name="txtcliente" class="w3-input  w3-border"  value="<?php echo $_GET['Cliente']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Funcionário</label>
    <h5 style="font-weight: bold;">Obs: Não é permitido trocar o funcionário vinculado ao pedido</h5>
    <input readonly="readonly" class="w3-input w3-border"  value="<?php echo $_GET['Funcionario'] ?>">

    <input name="txtidfuncionario" type="hidden" class="w3-input w3-gray w3-border" disabled value="<?php echo $_GET['ID_FUNCIONARIO']?>">
    <br>
       <!-----Situação----->

       <label style="font-weight: bold ;">Situação</label>
       <select name="situacao" id="situacao" class="w3-select w3-border">
     <?PHP if ($_GET["Situacao"] == 'Pedido') {?>
            <option value="">Selecionar</option>
            <option value="Pedido" selected>Pedido</option>
            <option value="Em Andamento">Em Andamento</option>
            <option value="Finalizado">Finalizado</option>
            <option value="Entregue">Entregue</option>
     <?PHP } elseif ($_GET["Situacao"] == 'Em Andamento') { ?>
            <option value="">Selecionar</option>
            <option value="Pedido">Pedido</option>
            <option value="Em Andamento"  selected>Em Andamento</option>
            <option value="Finalizado">Finalizado</option>
            <option value="Entregue">Entregue</option>
    <?PHP     } elseif ($_GET["Situacao"] == 'Finalizado') { ?>
            <option value="">Selecionar</option>
            <option value="Pedido">Pedido</option>
            <option value="Em Andamento" >Em Andamento</option>
            <option value="Finalizado"  selected>Finalizado</option>
            <option value="Entregue">Entregue</option>
    <?PHP } else { ?>
            <option value="">Selecionar</option>
            <option value="Pedido">Pedido</option>
            <option value="Em Andamento" >Em Andamento</option>
            <option value="Finalizado" >Finalizado</option>
            <option value="Entregue"  selected>Entregue</option>
   <?PHP  }?>
     </select>
    

      <?php /*$texto = $_GET["Situacao"];

     
      echo '<option value="0" ' . (($texto  == 'Finalizado') ? 'selected=selected' : '') . ' >Em revisão</option>';
    echo '<option value="1" ' . (($texto  == 'Em Andamento') ? 'selected=selected' : '') . ' >Publicado</option>';

*/?>

     </select>
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Tipo</label>
    <input  readonly="readonly" name="txttipo" class="w3-input  w3-border"  value="<?php echo $_GET["Tipo"] ?>">

    </div>
    <div id="Endereco" class="w3-container city" style="display:none">
    <div>
                <label class="w3-text-indigo" style="font-weight: bold;">CEP:</label>
                <input type="text" name="CEP"  class="w3-input  w3-border"  value="<?php echo $_GET['CEP']; ?>">
               
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Logradouro:</label>
                <input type="text" name="Logradouro" class="w3-input  w3-border"  value="<?php echo $_GET['Logradouro']; ?>" >
            </div>
            <br>     
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Número:</label>
                <input type="number" name="Numero"  class="w3-input  w3-border"  value="<?php echo $_GET['Numero']; ?>">
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Bairro:</label>
                <input type="text" name="Bairro"  class="w3-input  w3-border"  value="<?php echo $_GET['Bairro']; ?>" >
            
            </div>
            <br>       
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Cidade:</label>
                <input type="text" name="Cidade"  class="w3-input  w3-border"  value="<?php echo $_GET['Cidade']; ?>">  
            </div>
            <br>       
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Estado:</label>
                <input type="text" name="Estado"  class="w3-input  w3-border"  value="<?php echo $_GET['Estado']; ?>"> 
            </div>
            <br>
            <div>
                <label class="w3-text-indigo" style="font-weight: bold;">Pais:</label>
                <input type="text" name="Pais"  class="w3-input w w3-border"  value="<?php echo $_GET['Pais']; ?>">
            </div>

    </div>

   <!-- <div class="w3-container   w3-cell w3-cell-bottom " id="botao">-->
        <button name="btnatualizar" class="w3-button w3-margin w3-cell   w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-refresh "></i> Confirmar a Atualização </button>

        <a href="../Pedidos/pedidos.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i> Não Atualizar </a>
    <!--</div>-->

    </form>
</div>
<?php include_once ("../include/RodapeSistema.php");  ?>