<?php include_once ("../include/verificaAcesso.php"); ?>
<?php// require_once ("verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php") ?>

<?PHP 
  include_once '../include/ConexaoBanco.php';

$sql_atualiza_usuario = "SELECT `id_funcionario`, `nome`, `dataadmissao`, `cargo` FROM `funcionarios` WHERE `id_funcionario` = '".$_GET['id_funcionario']."'";
$result_atualiza_usuario = mysqli_query($conexao,$sql_atualiza_usuario);

while($linha_atualiza_usuario = mysqli_fetch_assoc($result_atualiza_usuario)) {

  $nome     = $linha_atualiza_usuario["nome"] ;
  $dataadmissao       = $linha_atualiza_usuario["dataadmissao"] ;
  $cargo  = $linha_atualiza_usuario["cargo"] ;
};


?>


<div class="w3-padding w3-content w3-text-grey quarter w3-margin w3-display-middle">
    <br>
    <br>
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Excluir: Id Funcionario: <?php echo " ".$_GET['id_funcionario']?> </h1>
    <form action="../funcionarios/excluirfuncionarioAction.php" class="w3-container" method='post'>
    <div id="DadosPedido" class="w3-container city">
    <input name="txtidfuncionario" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_funcionario']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Nome</label>
    <input name="txtnomefuncionario" class="w3-input w3-grey w3-border" disabled value="<?php echo "$nome"?>">
    <br>
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Data Admissão</label>
    <input name="txtdataadmissao" class="w3-input w3-grey w3-border" disabled value="<?php echo "$dataadmissao"  ?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Cargo</label>
    <input name="txtcargo" class="w3-input w3-grey w3-border" disabled value="<?php echo "$cargo"?>">

    </div>
    <div class="w3-container   w3-cell w3-cell-bottom " id="botao">
        <button name="btnExcuir" class="w3-button w3-margin w3-button w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-check "></i> Confirmar Exclusão.</button>

        <a href="../funcionarios/listagemfuncionarios.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i>Cancelar Exclusão</a>
    </div>

    </form>
</div>

<?php include_once ("../include/RodapeSistema.php") ?>