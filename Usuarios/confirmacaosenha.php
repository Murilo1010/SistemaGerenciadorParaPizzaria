<?php include_once ("../include/verificaAcesso.php"); ?>
<?php include_once ('../include/HeaderSistema.php'); ?>


<form class="w3-container" action="../Usuarios/confirmasenhaAction.php" method="POST">
    <input type="hidden" type="number" name="usuarioid" value="<?php echo $_GET['id_usuario']; ?>">
    <input type="hidden" type="text" name="usuario" value="<?php echo $_GET['usuario']; ?>">
    <input type="hidden" type="text" name="tipo" value="<?php echo $_GET['botao']; ?>">
    <input type="hidden" type="text" name="acesso" value="<?php echo $_GET['TipoAcesso']; ?>">

    <div class="w3-section w3-display-middle">
        <h2 style="font-weight: bold;">Antes De Continuar Por Favor Usar Uma Senha Válida</h2>
        <br>
        <input class="w3-input w3-border" id="senha" type="password" maxlength="10"  placeholder="Digite a Senha" name="txtSenha" required>
        <button class="w3-button w3-block w3-teal w3-section w3-padding" name="btnsenha" type="submit">Confirmar Senha</button>
    </div>
    <br>
    </div>
</form>

<?php 
//if (isset($_POST['btnsenha'])) {
// echo   validasenha($tipo,$txtSenha,$usuarioid);
//}



?>





<?php include_once ('../include/RodapeSistema.php'); ?>