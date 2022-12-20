<?php 
if(!isset($_SESSION))
{
session_start();
}
if((!isset ($_SESSION['acesso']) == true))
{
    header("location:/SistemaGerenciadorParaPizzaria_ProjetoFinal/include/acessoNegadoUsuarios.php");

die();
}
?>