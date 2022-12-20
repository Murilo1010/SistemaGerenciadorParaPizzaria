<?php include_once ('../include/HeaderSistema.php'); ?>
<?php 
session_start();

?>
<div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
 <?php
    include_once ('ConexaoBanco.php');

$sql = "INSERT INTO `usuarios`(`usuario`, `senha`, `TipoAcesso`) VALUES ('Usuario','1','GERENTE')";

if ($conexao->query($sql) === TRUE ) {
    echo '
    <div class="w3-container w3-yellow">
        <a href="../TelaLogin/telalogin.php">
        <h4 class="w3-button w3-green w3-center">Esses São Seus Dados Para o Login </h4>
        <br><br>
        <label class="w3-text-blue" style="font-weight: bold;">Usuário: Usuario </label>
        <br><br>
        <label class="w3-text-blue" style="font-weight: bold;">Senha: 1 </label>
        <br><br>
        <label class="w3-text-blue" style="font-weight: bold;">Acesso: GERENTE</label>
        </a>
        <label class="w3-button w3-red w3-center">ATENÇÃO: Ao Entrar No Sistema Atualizar Os Dados</label>
    </div>
    ';
    $_SESSION['primeiroacesso'] = 'Primeiro Acesso';
    } else {
    echo '
    <a href="../TelaLogin/telalogin.php">
    <h1 class="w3-button w3-red w3-center">Ocorreu um problema ao gerar os dados do primeiro acesso</h1>
    </a>
    ';
    }

    $conexao->close();
   
 ?>
</div>
<?php include_once ('../include/RodapeSistema.php'); ?>