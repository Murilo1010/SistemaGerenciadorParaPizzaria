<?php include_once ("../include/verificaAcesso.php"); ?>
<?php include_once ('../include/HeaderSistema.php'); ?>

<a href="../menu/menu.php" class="w3-display-topleft ">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-large"></i> 
</a>



 <?php
    include_once '../include/ConexaoBanco.php';

 echo '
 <div class="w3-padding w3-content w3-display-container w3-auto w3-margin w3-responsive">
 <h1 class="w3-center w3-blue w3-round-large w3-margin">Listagem de Funcionários</h1>
 <a href="cadastrofuncionario.php?botao=adicionar"><button class="w3-right  btn-adicionar"><i class="fa fa-check" aria-hidden="true"></i> Novo Funcionário
 </button></a>
<br>
    <table class="w3-table-all w3-left w3-centered ">
        <thead class="w3-hoverable"> 
            <tr class="w3-center w3-blue w3-hover-green">
                <th>ID</th>
                <th>Nome</th>
                <th>Data da Admissão</th>
                <th>Cargo</th>
                <th>Atualizar</th>
                <th>Detalhes</th>
                <th>Excluir</th>
            </tr>
        <thead>
 ';
 
 $sql = "SELECT `id_funcionario`,`nome`,DATE_FORMAT(dataadmissao,'%d-%m-%Y')as date, `cargo` FROM funcionarios "; 

 $resultado = $conexao->query($sql);
 if($resultado != null)
 foreach($resultado as $linha) {
 echo '<tr>';
 echo '<td>'.$linha['id_funcionario'].'</td>';
 echo '<td>'.$linha['nome'].'</td>';
 echo '<td>'.$linha['date'].'</td>';
 echo '<td>'.$linha['cargo'].'</td>';
 echo '<td><a href="atualizarfuncionario.php?id_funcionario='.$linha['id_funcionario'].'"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td></td>';
 echo '<td><a href="detalhesdadosfuncionarios.php?id_funcionario='.$linha['id_funcionario'].'"><i class="  fa fa-info-circle w3-large w3-text-teal""></i></a></td></td>';
 echo '<td><a href="excluirfuncionario.php?id_funcionario='.$linha['id_funcionario'].'"><i class="fa fa-user-times w3-large w3-text-teal"></i></a></td></td>';

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


<?php include_once '../include/RodapeSistema.php' ?>