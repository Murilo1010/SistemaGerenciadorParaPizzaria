<?php include_once ("../include/HeaderSistema.php"); ?>
<?php include_once ("../include/ConexaoBanco.php"); ?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle" >
<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
else
{
    session_destroy();
    session_start(); 
}

$nome = $_POST['txtNome'];
$senha = $_POST['txtSenha']; 



$sql = "SELECT senha FROM usuarios WHERE usuario  = '".$nome."';";
$resultado = $conexao->query($sql);
//echo $sql;
$linha = mysqli_fetch_array($resultado); 
if($linha != null)
{
if($linha["senha"] == $senha)
{
echo '
<a href="../Menu/menu.php">
<h1 class="w3-button w3-teal">'.$nome.', Seja Bem-Vindo! </h1>
</a> 
';
$_SESSION['logado'] = $nome;


} 
else
{
echo '
<a href="../TelaLogin/telalogin.php">
<h1 class="w3-button w3-teal">Login Inválido! </h1>
</a> 
';
}
}
else
{
echo '
<a href="../TelaLogin/telalogin.php">
<h1 class="w3-button w3-teal">Login Inválido! </h1>
</a> 
';
}
$conexao->close();
?>
</div>

<?php  include_once ("../include/RodapeSistema.php"); ?>