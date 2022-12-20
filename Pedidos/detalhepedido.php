<?php include_once ("../include/HeaderSistema.php"); ?>
<?php 

$tipoentrega = $_GET['Tipo'];


if ($tipoentrega == "Entrega") {

    $logradouro  = $_GET['Logradouro'];
    $numero      = $_GET['Numero'];
    $cidade      = $_GET['Cidade'];
    $bairro      = $_GET['Bairro'];
    $estado      = $_GET['Estado'];
    $pais        = $_GET['Pais'];
    $CEP         = $_GET['CEP'];

}else {

    $logradouro  = "Não Informado";
    $numero      = "Não Informado";
    $cidade      = "Não Informado";
    $bairro      = "Não Informado";
    $estado      = "Não Informado";
    $pais        = "Não Informado";
    $CEP         = "Não Informado";

};


?>
 
 <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
    <p>Essa Página Serve Para Conferir ou Consultar os Dados Do Pedido</p>
 </div>

 <div class="w3-card-4">

  

    <header class="w3-container w3-blue">
        <h4 class="w3-center w3-text-orange" style="font-weight: bold;">Dados Do Pedido Nr: <?php echo $_GET['id_pedido']  ?></h4>
    </header>
    <br>
    <div class="w3-container w3-border">
        <div class="w3-border w3-padding">
            <label  style="font-weight: bold;">Cliente: </label><label><?php echo strtoupper($_GET['Cliente']) ?></label> <br>
            <label  style="font-weight: bold;">Funcionário: </label><label><?php echo strtoupper($_GET['id_funcionario'])." ". strtoupper($_GET['Funcionario']) ?></label> <br>
        </div>

        <div class="w3-border w3-padding">
            <label  style="font-weight: bold;">Situação Do Pedido: </label><label><?php echo strtoupper($_GET['Situacao']) ?></label><br>
            <label  style="font-weight: bold;">Tipo Do Pedido: </label><label><?php echo strtoupper("$tipoentrega") ?></label> <br>
        </div>
    </div>

    <div class="w3-container w3-border">
                <h4 class="w3-center w3-text-orange" style="font-weight: bold;">Endereço Do Cliente:</h4>

            <div  class="w3-container w3-border w3-padding">

                <label  style="font-weight: bold;">CEP: </label><label><?php  echo  strtoupper("$CEP") ?></label>

            </div>
            <br>
            <div  class="w3-container w3-border w3-padding">
            
                <label style="font-weight: bold;">Logradouro: </label><label><?php echo  strtoupper("$logradouro") ?></label><br>
                <label style="font-weight: bold;">Número: </label><label><?php echo strtoupper("$numero") ?></label>

            </div>
            <br>
            <div  class="w3-container w3-border w3-padding">

                <label  style="font-weight: bold;">Cidade: </label><label><?php  echo  strtoupper("$cidade") ?></label><br>
                <label  style="font-weight: bold;">Bairro: </label><label><?php  echo  strtoupper("$bairro") ?></label>

            </div>
            <br>
            <div  class="w3-container w3-border w3-padding">

                <label  style="font-weight: bold;">Estado: </label><label><?php  echo  strtoupper("$estado") ?></label><br>
                <label  style="font-weight: bold;">Pais: </label><label><?php  echo  strtoupper("$pais") ?></label>

            </div>    
    </div>
    <br>

    <footer class="w3-container w3-blue">
        <h5>Pizzaria Boa Pizza</h5>
    </footer>

</div>

<a href="../Pedidos/pedidos.php" class="w3-margin w3-button w3-teal  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-arrow-left w3-xxlarge"></i>Voltar Para Página de Pedidos</a>





<?php include_once ("../include/RodapeSistema.php"); ?>