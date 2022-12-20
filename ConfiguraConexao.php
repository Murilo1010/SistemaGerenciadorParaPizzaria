<?php include_once ("include/verificarAcesso.php"); ?>
<?php include_once ("include/HeaderLogin.php"); ?>
<?php


$linhas = file("Conexao.txt");

foreach ($linhas as $linha) { //loop em todas as linhas
    $result[] = $linha;
}

fclose($arquivo);



$server  = $result[9];
$usuario = $result[10];
$senha   = $result[11];
$banco   = $result[12];


?>

<div class="telalogin">
    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="">
        <div class="w3-center">
            <h4 style="font-weight: bold;">Configuração do Banco de Dados</h4>
            <br>
        <form class="w3-container" action="ConfiguraConexao.php" id="telalogin" method="post">
        <div class="w3-section">
            <div class="w3-border w3-padding w3-border-blue w3-container"> 
                <label style="font-weight: bold;">Servername Atual</label>
                <input class="w3-input w3-border w3-margin-bottom w3-gray" id="server" type="text" value="<?php echo "$server";  ?>" placeholder="" name="" disabled >

                <label style="font-weight: bold;">Servername Novo</label>
                <input class="w3-input w3-border w3-margin-bottom " id="server" type="text" maxlength="" placeholder="Digite o seu server" name="server"  >
            </div>
            <br>

            <div class="w3-border w3-padding w3-border-blue w3-container">
                <label style="font-weight: bold;">Usuário Atual</label>
                <input class="w3-input w3-border w3-gray" id="usuario" type="text" value="<?php echo "$usuario";  ?>"  placeholder="" name="" disabled>

                <label style="font-weight: bold;">Usuário Novo</label>
                <input class="w3-input w3-border " id="usuario" type="text" maxlength=""  placeholder="Digite o usuário" name="usuario" >
            </div>  
            <br>
            <div class="w3-border w3-padding w3-border-blue w3-container">
                <label style="font-weight: bold;">Senha Atual</label>
                <input class="w3-input w3-border w3-gray" id="senha" type="password" value="<?php echo "$senha";  ?>" placeholder="" name="" disabled>

                <label style="font-weight: bold;">Senha Nova</label>
                <input class="w3-input w3-border " id="senha" type="password" maxlength=""  placeholder="Digite a Senha" name="senha" >
            </div>
            <br>
            <div class="w3-border w3-padding w3-border-blue w3-container">
                <label style="font-weight: bold;">Nome do Banco Atual</label>
                <input class="w3-input w3-border w3-gray" id="banco" type="text" value="<?php echo "$banco";  ?>"  placeholder="" name="" disabled>
            
                <label style="font-weight: bold;">Nome do Banco Novo</label>
                <input class="w3-input w3-border " id="banco" type="text" maxlength=""  placeholder="Digite o Banco de dados" name="banco" disabled>
            </div>

            <button class="w3-button w3-block w3-teal w3-section w3-padding" name="confirma" value="confirma" type="submit">Confirmar Modificação</button> 
            <button class="w3-button w3-block w3-teal w3-section w3-padding" name="limpar" value="limpa" type="submit">Limpar Conexão</button> 
        </div>
            </form>
    </div>
</div>

<?php 
if (isset($_POST['limpar'])) {echo limpa();}

if (isset($_POST['confirma'])) 
{
    $arquivo = 'ConexaoString.txt';

    $fp = fopen($arquivo, "a+");

    $string = $_POST["server"]."\r\n".$_POST["usuario"]."\r\n".$_POST["senha"]."\r\n".$_POST["banco"];


    fwrite($fp, $string);

    fclose($fp);
}



function limpa() {
    $a = 'teste.txt';
    $b = file_get_contents('teste.txt');
    $c = preg_replace('/[a-z]/', '', $b);
    echo $c;
    file_put_contents($a, $c);
};

?>


<?php  include_once ("include/RodapeSistema.php"); ?>