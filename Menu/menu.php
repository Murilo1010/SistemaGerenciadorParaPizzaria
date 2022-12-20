<?php 
    error_reporting(0);
    include_once ("../include/verificaAcesso.php"); 
?>
<?php include_once ("../include/HeaderSistema.php"); ?>
<?php session_start(); ?> 
<body class="w3-light-grey">
  <div class="w3-padding w3-content w3-text-grey w3-third  w3-display-topright">
    <form action="../include/logoutAction.php" class="w3-container" method='post'>
        <button name="btnLogout" class="w3-button w3-red w3-cell w3-round-large w3-right w3-margin-right">
            <i class="w3-xxlarge fa fa-times-rectangle"> </i> Sair
        </button>
    </form>
</div>

<div class="w3-bar w3-blue">
  <button class="w3-bar-item w3-button" onclick="openCity('Menu')"><i class="fa fa-home" aria-hidden="true"></i> Menu</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Funcionarios')"><img src="../Imagens/icon_funcionarios.ico" style="width:25px;height:25px;">Funcionários</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Produtos')"><i class="fa fa-coffee" aria-hidden="true"></i> Produtos</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Clientes')"><i class="fa fa-user-o" aria-hidden="true"></i> Clientes</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Pedidos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Pedidos</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Usuario')"><i class="fa fa-user-o" aria-hidden="true"></i> Usuarios</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Graficos')"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gráficos</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Cozinha')"><i class="fa fa-coffee" aria-hidden="true"></i> Cozinha</button>

</div>

<!----------------Aba Menu---------------------->
<div id="Menu" class="w3-container city">
    <h1 class="w3-center w3-green">Seja Bem-Vindo Ao Sistema Gerenciador Para Pizzaria Da Pizzaria Boa Pizza</h1>
<?php
    include_once ("../include/ConexaoBanco.php");
?>

<div class="grupoFuncDoMes" >
        <?php 
        echo '
        <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
        <br>
            <h4 class="w3-center w3-container w3-blue">Funcionário do Mês</h4>
            <table class="w3-table-all w3-left w3-centered ">
                <thead class="w3-hoverable"> 
                    <tr class="w3-center w3-blue w3-hover-green">
                        <th>Funcionário</th>
                        <th>Valor Total(Vendas)</th>
                    </tr>
                <thead>
        ';
        
        $sql = "SELECT FUNCIONARIOS.nome AS 'Funcionario', SUM((PEDITEM.Quantidade * PEDITEM.precoUn)) AS 'Valor Total'  
        FROM pedido PEDIDO 
        INNER JOIN pedidoitem PEDITEM ON PEDIDO.id_pedido = PEDITEM.id_pedido
        INNER JOIN funcionarios FUNCIONARIOS ON PEDIDO.id_funcionario = FUNCIONARIOS.id_funcionario
        GROUP BY PEDIDO.id_funcionario"; 
        
        $resultado = $conexao->query($sql);
        if($resultado != null)
        foreach($resultado as $linha) {
        echo '<tr>';
        echo '<td>'.$linha['Funcionario'].'</td>';

        $totalcorrigido = str_replace(".",",",$linha['Valor Total']);

        echo '<td>R$ '.$totalcorrigido.'</td>';

       
        //echo '<td><a href="confirmacaosenha.php?id_usuario='.$linha['id'].'&usuario='.$linha['usuario'].'&acesso='.$linha['TipoAcesso'].'&botao=detalhar"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';
        echo '</tr>';
        }
        echo '
        </table>
        </div>';
        $conexao->close();
        ?>
</div>



</div>
 
<!----------------Aba Funcionários---------------------->
<div id="Funcionarios" class="w3-container city input2" style="display:none">
        <a href="../funcionarios/listagemfuncionarios.php" style="text-decoration: none;">
            <button id="Funcionario_Menu" class="w3-display-middle w3-blue w3-button w3-round ">
                <i class=" fa fa-list-alt input2" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Funcionários</p>
            </button>
        </a>


</div>

<!----------------Aba Produtos---------------------->
<div id="Produtos" class="w3-container city" style="display:none">
        <a href="../produtos/listar.php" style="text-decoration: none;">
            <button id="test" class="w3-display-middle w3-blue w3-button w3-round">
                <i class=" fa fa-list-alt" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Produtos</p>
            </button>
        </a>

</div>

<!----------------Aba Clientes---------------------->
<div id="Clientes" class="w3-container city" style="display:none">
        <a href="../clientes/listar.php" style="text-decoration: none;">
            <button class="w3-display-middle w3-blue w3-button w3-round">
                <i class=" fa fa-list-alt" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Clientes</p>
            </button>
        </a>

    
</div>



<!----------------Aba Pedidos---------------------->

<div id="Pedidos" class="w3-container city" style="display:none">
        <a href="../Pedidos/pedidos.php" style="text-decoration: none;">
            <button class="w3-display-middle w3-blue w3-button w3-round">
                <i class=" fa fa-list-alt" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Pedidos</p>
            </button>
        </a>

    
</div>







<!--------------------Aba Usuarios----------------------------------->
<div id="Usuario" class="w3-container city" style="display:none">
        <a href="../Usuarios/listagemusuarios.php" style="text-decoration: none;">
            <button class="w3-display-middle w3-blue w3-button w3-round">
                <i class=" fa fa-list-alt" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Usuários</p>
            </button>
        </a>
</div>


<!--------------------Aba Gráficos----------------------------------->
<div id="Graficos" class="w3-container city" style="display:none">
    <a href="../Graficos/graficos.php" style="text-decoration: none;">
            <button   class="w3-display-middle w3-blue w3-button w3-round">
                <i class=" fa fa-list-alt" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Gráficos</p>
            </button>
        </a>
</div>

<!-------------------Aba Cozinha------------------------------>
<div id="Cozinha" class="w3-container city input2" style="display:none">
        <a href="listagemcozinha.php" style="text-decoration: none;">
            <button id="Cozinha_Menu" class="w3-display-middle w3-blue w3-button w3-round ">
                <i class=" fa fa-list-alt input2" style="font-size: 8.5em"></i>
                <p style="font-size: 2em">Listagem dos Pedidos <br>(por Item)</p>
            </button>
        </a>


</div>

<?php  include_once ("../include/RodapeSistema.php"); ?>