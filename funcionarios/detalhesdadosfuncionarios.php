<?php include_once ("../include/HeaderSistema.php"); ?>

 <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-blue">
    <p>Essa Página Serve Para Conferir ou Consultar os Dados Do Pedido</p>
 </div>


<?php

require_once ('../include/ConexaoBanco.php');

$sql_atualiza_usuario = "SELECT `id_funcionario`, `nome`, `dataadmissao`, `cargo` FROM `funcionarios` WHERE `id_funcionario` = '".$_GET['id_funcionario']."'";
 $result_atualiza_usuario = mysqli_query($conexao,$sql_atualiza_usuario);

 while($linha_atualiza_usuario = mysqli_fetch_assoc($result_atualiza_usuario)) {
 
    $codigofuncionario = $linha_atualiza_usuario["id_funcionario"];
    $nome     = $linha_atualiza_usuario["nome"] ;
    $dataadmissao       = $linha_atualiza_usuario["dataadmissao"] ;
    $cargo  = $linha_atualiza_usuario["cargo"] ;
  };
  
  
  
  
  ?>
    
    <div class="w3-card-4">
      <header class="w3-container w3-blue">
          <h4 class="w3-center w3-text-orange" style="font-weight: bold;">ID: <?php echo $_GET['id_funcionario']  ?></h4>
      </header>
      <br>
      <div class="w3-container w3-border">
          <div class="w3-border w3-padding">
              <label  style="font-weight: bold;">Funcionário: </label><label><?php echo strtoupper("$codigofuncionario")." ". strtoupper("$nome") ?></label> <br>
          </div>
  
          <div class="w3-border w3-padding">
              <label  style="font-weight: bold;">Data Admissão: </label><label><?php echo strtoupper("$dataadmissao") ?></label><br>
              <label  style="font-weight: bold;">Cargo: </label><label><?php echo strtoupper("$cargo") ?></label> <br>
          </div>
      </div>
      <br>
      <footer class="w3-container w3-blue">
          <h5>Pizzaria Boa Pizza</h5>
      </footer>
  </div>
  
  <a href="listagemfuncionarios.php" class="w3-margin w3-button w3-teal  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-arrow-left w3-xxlarge"></i>Voltar para a página de listagem dos funcionários</a>
  
  
  
  
  
  <?php include_once ("../include/RodapeSistema.php"); ?>