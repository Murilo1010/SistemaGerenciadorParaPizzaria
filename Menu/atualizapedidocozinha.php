<?php include_once ("../include/HeaderSistema.php"); 




?>



<div class="w3-padding w3-content w3-text-grey quarter w3-margin w3-display-middle">
    <br>
    <br>
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Atualizar Situação do <br>Item do Pedido: <?php echo " ".$_GET['id_pedido']?> </h1>
    <form action="../Menu/atualizapedidocozinhaAction.php" class="w3-container" method='post'>
    <div id="DadosPedido" class="w3-container city">
    <input name="txtnrpedido" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_pedido']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Sabor</label>
    <input readonly="readonly" name="txtcliente" class="w3-input  w3-border"  value="<?php echo $_GET['Sabor']?>">
    <br>

    <label class="w3-text-indigo" style="font-weight: bold;">Quantidade</label>
    <input disabled="disabled" name="txttipo" class="w3-input  w3-border"  value="<?php echo $_GET["Qtd"] ?>">
    <br>

       <!-----Situação----->

       <label style="font-weight: bold ;">Situação do Item</label>
       <select name="situacao" id="situacao" class="w3-select w3-border">
     <?PHP if ($_GET["situacao_item"] == 'Em Aberto') {?>
            <option value="Em Aberto" selected>Em Aberto</option>
            <option value="Em Preparação">Em Preparação</option>
            <option value="Finalizado">Finalizado</option>
     <?PHP } elseif ($_GET["situacao_item"] == 'Em Preparação') { ?>
            <option value="Em Aberto">Em Aberto</option>
            <option value="Em Preparação"  selected>Em Preparação</option>
            <option value="Finalizado">Finalizado</option>
    <?PHP } else { ?>
            <option value="Em Aberto">Em Aberto</option>
            <option value="Em Preparação" >Em Preparação</option>
            <option value="Finalizado"  selected>Finalizado</option>
   <?PHP  }?>
     </select>

     <input type="hidden" id="SeqItem" name="SeqItem" value="<?=$_GET["SeqItem"]?>">
    

   
   <!-- <div class="w3-container   w3-cell w3-cell-bottom " id="botao">-->
        <button name="btnatualizar" value="aa" class="w3-button w3-margin w3-cell   w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-refresh "></i> Confirmar a Atualização </button>

        <a href="../Menu/listagemcozinha.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i> Não Atualizar </a>
    <!--</div>-->

    </form>
</div>
<?php include_once ("../include/RodapeSistema.php");  ?>