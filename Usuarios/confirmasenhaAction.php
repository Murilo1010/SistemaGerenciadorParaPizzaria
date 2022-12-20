<?php //include_once ("../include/verificaAcesso.php"); ?>
<?php include_once ('../include/HeaderSistema.php'); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >

<?php 
$idusuario = $_POST["usuarioid"];
$usuario = $_POST["usuario"];
$tipo = $_POST["tipo"];
$senha = $_POST["txtSenha"]; 
$acesso = $_POST['acesso'];
include_once ('../include/ConexaoBanco.php');

$teste = $_POST["usuarioid"];


$sql = "SELECT senha FROM usuarios WHERE TipoAcesso = 'GERENTE'  ;";
$resultado = $conexao->query($sql);

$linha = mysqli_fetch_array($resultado); 
if($linha != null)
{
if($linha["senha"] == $senha)
{
    /*Trocar onde esta SistemaGerenciadorParaPizzaria_ProjetoFinal pelo nome da pasta que for ficar o projeto FINAL*/ 
    if($tipo == "atualizar") {header('Location: http://localhost/SistemaGerenciadorParaPizzaria_ProjetoFinal/Usuarios/atualizarusuario.php?id_usuario='.$idusuario.'&usuario='.$usuario.'&acesso='.$acesso.''); exit;} 
    elseif ($tipo == "excluir") {header('Location: http://localhost/SistemaGerenciadorParaPizzaria_ProjetoFinal/Usuarios/excluirusuario.php?id_usuario='.$idusuario.'&usuario='.$usuario.'&acesso='.$acesso.'');} 
    elseif  ($tipo == "adicionar") {header('Location: http://localhost/SistemaGerenciadorParaPizzaria_ProjetoFinal/Usuarios/cadastrousuario.php');}
$_SESSION['acesso'] = $idusuario;
} 
else
{
echo '
<a href="../Menu/menu.php">
<h1 class="w3-button w3-teal">Login Inválido! </h1>
</a> 
';
}
}
else
{
echo '
<a href="../Menu/menu.php">
<h1 class="w3-button w3-teal">Login Inválido! </h1>
</a> 
';
}
$conexao->close();

?>

</div> 

<?php include_once ('../include/RodapeSistema.php'); ?>