<?php 
    error_reporting(0);
  //  include_once ("../include/verificaAcesso.php"); 
?>
<?php// require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ("../include/HeaderSistema.php"); ?>

<div class="w3-padding w3-content w3-text-grey quarter w3-margin w3-display-middle">
    <br>
    <br>
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Excluir: Id Usuário: <?php echo " ".$_GET['id_usuario']?> </h1>
    <form action="../Usuarios/excluirusuarioAction.php" class="w3-container" method='post'>
    <div id="DadosPedido" class="w3-container city">
    <input name="txtidusuario" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_usuario']?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Usuário</label>
    <input name="txtusuario" class="w3-input w3-grey w3-border" disabled value="<?php echo $_GET['usuario']?>">
    <br>
    </div>
    <div class="w3-container   w3-cell w3-cell-bottom " id="botao">
        <button name="btnExcuir" class="w3-button w3-margin w3-button w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-check "></i> Confirmar Exclusão.</button>

        <a href="../Usuarios/listagemusuarios.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i>Cancelar Exclusão</a>
    </div>

    </form>
</div>

<?php include_once ("../include/RodapeSistema.php") ?>