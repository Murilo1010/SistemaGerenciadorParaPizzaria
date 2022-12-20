<?php include_once ("verificarAcesso.php"); ?>
<?php
    unset( $_SESSION["logado"] ); 
    header("location:/SistemaGerenciadorParaPizzaria_ProjetoFinal/TelaLogin/telalogin.php");
?>