<?php 
    error_reporting(0);
    include_once ("../include/verificaAcesso.php"); 
?>
<?php include_once ("../include/HeaderSistema.php"); ?>

<!--Botão para voltar para o menu-->
<a href="../Menu/menu.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-large"></i> 
</a>

 <?php
    require_once '../include/ConexaoBanco.php';
 echo '
 <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Listagem de Usuários</h1>
<a href="../Usuarios/confirmacaosenha.php?botao=adicionar"><button class="w3-right  btn-adicionar"><i class="fa fa-check" aria-hidden="true"></i> Novo Usuário
</button></a>
<br>
    <table class="w3-table-all w3-left w3-centered ">
        <thead class="w3-hoverable"> 
            <tr class="w3-center w3-blue w3-hover-green">
                <th>Id</th>
                <th>Usuário</th>
                <th>Excluir</th>
                <th>Atualizar</th>
            </tr>
        <thead>
 ';
 
 $sql = "SELECT id,usuario FROM usuarios"; 

 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {
 echo '<tr>';
 echo '<td>'.$linha['id'].'</td>';
 echo '<td>'.$linha['usuario'].'</td>';
 echo '<td><a href="confirmacaosenha.php?id_usuario='.$linha['id'].'&usuario='.$linha['usuario'].'&acesso='.$linha['TipoAcesso'].'&botao=excluir"><i class="fa fa-user-times w3-large w3-text-teal"></i> </a></td></td>';
 echo '<td><a href="confirmacaosenha.php?id_usuario='.$linha['id'].'&usuario='.$linha['usuario'].'&acesso='.$linha['TipoAcesso'].'&botao=atualizar"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td></td>';
 //echo '<td><a href="confirmacaosenha.php?id_usuario='.$linha['id'].'&usuario='.$linha['usuario'].'&acesso='.$linha['TipoAcesso'].'&botao=detalhar"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';

 echo '</tr>';
 }
 echo '
 </table>
 </div>';
 $conexao->close();
 ?>
 </div>
</body>
</html>






<?php include_once ("../include/RodapeSistema.php"); ?>