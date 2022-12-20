<?php 
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  error_reporting(0);
  include_once ("../include/verificaAcesso.php"); 
?>
<?php //require_once ("../include/verificaAcessoUsuarios.php"); ?>
<?php include_once ('../include/HeaderSistema.php'); ?>

<?php
     
      $teste = $_SESSION['idusuario']; ?>
<?PHP 



include_once "../include/ConexaoBanco.php";
$sql_atualiza_usuario = "SELECT * FROM `usuarios` WHERE id = '".$_GET['id_usuario']."'";
$result_atualiza_usuario = mysqli_query($conexao,$sql_atualiza_usuario);

while($linha_atualiza_usuario = mysqli_fetch_assoc($result_atualiza_usuario)) {

  $usuario     = $linha_atualiza_usuario["usuario"] ;
  $senha       = $linha_atualiza_usuario["senha"] ;
  $tipoacesso  = $linha_atualiza_usuario["TipoAcesso"] ;
};

echo $teste;
?>

<div class="w3-padding w3-content w3-text-grey quarter w3-margin w3-display-middle">
    <br>
    <br>
    <h1 class="w3-center w3-indigo w3-round-large w3-margin">Atualizar: Usuário: <?php echo " ".$_GET['id_usuario'];?> </h1>
    <form action="../Usuarios/atualizarusuarioAction.php" class="w3-container" method='post'>
    <div  class="w3-container city">
      
    <input name="txtidusuario" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id_usuario'];?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Usuário</label>
    <input name="txtusuario" class="w3-input  w3-border"  value="<?php echo $_GET['usuario']; ?>">
    <br>
    <label class="w3-text-indigo" style="font-weight: bold;">Senha</label>
    <input  class="w3-input  w3-border"  value="<?php echo $senha ?>">
    <br>
  <!--  <label class="w3-text-indigo" style="font-weight: bold;">Tipo de Acesso</label>
    <input name="txttipoacesso" class="w3-input w3-gray w3-border" disabled  value="<?php //echo $tipoacesso ?>">
    <br>-->
    </div>

   <div class="w3-container   w3-cell w3-cell-bottom " id="botao">
        <button name="btnatualizar" class="w3-button w3-margin w3-cell   w3-green w3-round-large  w3-right"><i class="w3-xxlarge fa fa-refresh "></i> Confirmar a Atualização </button>

        <a href="../Usuarios/listagemusuarios.php" class="w3-margin w3-button w3-red  w3-round-large w3-left" style="text-decoration:none; "><i class="fa fa-ban w3-xxlarge"></i> Não Atualizar </a>
    </div>

    </form>
</div>






<?php include_once ('../include/RodapeSistema.php') ?>