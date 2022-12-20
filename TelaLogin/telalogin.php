<?php 
    error_reporting(0);
    include_once ("../include/HeaderLogin.php"); 
?>
<script>
 function mudarAction()
        {
    document.getElementById('telalogin').action = '../include/primeiroacessoAction.php';
    document.getElementById('telalogin').submit();
}

</script>
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

$_SESSION['primeiroacesso'];
?>
<div class="telalogin">
    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="">
        <div class="w3-center">
            <h4 style="font-weight: bold;">Seja Bem-Vindo Ao Sistema Gerenciador Para Pizzarias</h4>
            <br>
        <?php  echo "Data: ".date("d-m-Y")."<br>";    ?>
            <br>
            <img src="../Imagens/imagem da pizzaria.jpg" alt="Pizzaria Boa Pizza" style="width:40%" class="w3-circle w3-margin-top">
        </div>
        <form class="w3-container" action="../TelaLogin/loginAction.php" id="telalogin" method="post">
        <div class="w3-section">
            <label style="font-weight: bold;">Usuário</label>
            <input class="w3-input w3-border w3-margin-bottom" id="usuario" type="text" maxlength="10" placeholder="Digite o seu usuário" name="txtNome" required>
            <label style="font-weight: bold;">Senha</label>
            <input class="w3-input w3-border" id="senha" type="password" maxlength="10"  placeholder="Digite a Senha" name="txtSenha" required>
            <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Entrar</button> 
            <?php   if((!isset ($_SESSION['primeiroacesso']) == true)) { ?>
                <input class="w3-button w3-block w3-blue w3-section w3-padding" id="btnadicionarusuario" name="btnadicionarusuario" type="button" value="Primeiro Acesso" onClick="mudarAction()" />
            <?php   } ?>

        
        </div>
            </form>
        <br>
        <form action="telalogin.php" method="post">
        <button class="w3-button w3-block w3-teal w3-section w3-padding" name="btnresetar" type="submit">Resetar Session</button> 
        </form>
    </div>
</div>
<?php 
if (isset($_POST['btnresetar'])) 
{
    unset($_SESSION['primeiroacesso']);
    include_once ("../include/ConexaoBanco.php");
 
    $sql = "DELETE FROM usuarios WHERE id = 1; ";
    $sql2 = 'ALTER TABLE usuarios AUTO_INCREMENT = 1;';
    
    if ($conexao->query($sql) === TRUE) {
        if ($conexao->query($sql2) === TRUE) 
        {
            echo '
            <a href="../TelaLogin/telalogin.php">
            <h5 class="w3-button w3-blue">Comando Realizado Com Sucesso </h5>
            </a>
            ';
        } else {
            echo '
            <a href="../TelaLogin/telalogin.php">
            <h1 class="w3-button w3-blue">ERRO no sql2! </h1>
            </a>
            ';
        }
    }else {
    echo '
    <a href="../TelaLogin/telalogin.php">
    <h1 class="w3-button w3-blue">ERRO! </h1>
    </a>
    ';
    }
    $conexao->close();
}

?>


<?php include_once ("../include/Rodape.php"); ?>