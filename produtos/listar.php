
<?php

// Incluir a conexao com BD
include_once ("../include/verificaAcesso.php"); 
require_once "../include/HeaderSistema.php";
require_once "../include/ConexaoBancoPDO.php";

// Receber a pagina

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
$txt_pesquisa = filter_input(INPUT_GET, "txt_pesquisa", FILTER_DEFAULT);

echo "<div class='container'>
        <span id='msgAlerta'></span>
        <div class='row'>
        <div class='col-lg-12'>
            <div class='row mt-4 mb-2'>
                <div class='col-lg-12 d-flex justify-content-between align-items-center'>
                
                <!--Botão para voltar para o menu-->
                <a href='../Menu/menu.php' class='w3-display-topleft'>
                    <i class='fa fa-arrow-circle-left w3-large w3-teal w3-button w3-large'></i> 
                </a>             
                
                <h4>Listar Produtos da Pizzaria</h4>
                    <div>
                        <button type='button' class='btn btn-outline-success btn-sm' 
                        onclick=\"document.getElementById('sabor').value ='';
                                document.getElementById('preco').value ='';
                                document.getElementById('msgAlertaErro').innerHTML = ''\"
                        data-bs-toggle='modal' data-bs-target='#cadprodutoModal'><i class='bi bi-person-plus-fill'></i>Novo Produto</button>
                    </div>
                </div>";

if (empty($pagina))
{$pagina=1;


}

if (!empty($pagina)) {
  
    // Variavel da pesquisa 
    
        // Calcular o inicio da visualizacao
        $qnt_result_pg = 6; // Quantidade de registro por pagina
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    
        // Criar a QUERY para recuperar os registros do BD
        // Testar erro: WHERE usr.id = 100 
    
        $query_produtos = "SELECT id_produto, sabor, preco FROM produto
                WHERE sabor LIKE '%{$txt_pesquisa}%' ORDER BY sabor ASC 
                LIMIT $inicio, $qnt_result_pg";
    
        $result_produtos = $conn->prepare($query_produtos);
        $result_produtos->execute();

        
    
        if (($result_produtos) and ($result_produtos->rowCount() != 0)) {
?>

                <form  action="../produtos/listar.php" method="get">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" name="txt_pesquisa" value="<?=$txt_pesquisa?>" autocomplete="off"     placeholder="Pesquise pelo sabor do Produto" aria-describedby="button-addon2"/>
                        <button class="btn btn-outline-success btn-sm" button type="submit"><i class="bi bi-search"></i> Pesquisar</button>
                    </div>
                </form>

        
                <div class="tabela text-center">
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sabor</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
    
        <?php 
            while ($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
                extract($row_produto);
        ?>

                        <tr>
                            <td class="text-nowrap"><?=$sabor?></td> 
                            <?php
                                $precocorrigido = str_replace(".",",",$preco);  
                            ?>
                            <td class="text-center">R$ <?=$precocorrigido?></td>
                            <td class="text-center col-sm-3"><a href='#' class='btn btn-outline-primary btn-sm' onclick='visproduto(<?=$id_produto?>)'>Visualizar</a> <a href='#' class='btn btn-outline-warning btn-sm' onclick='editprodutoDados(<?=$id_produto?>)'><i class='bi bi-pencil-square'></i> Editar</a>  <a href='#' class='btn btn-outline-danger btn-sm' onclick='apagarprodutoDados(<?=$id_produto?>)'><i class='bi bi-trash-fill'></i> Apagar</a></td>
                        </tr>
        <?php
            }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>

<?php
    // Paginacao - Somar a quantidade de registros que ha BD

    $query_pg = "SELECT count(*) AS num_result FROM produto WHERE sabor LIKE '%{$txt_pesquisa}%'";
  

    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

    // Quantidade de pagina
    $totalreg =  $row_pg['num_result'];
    $quantidade_pg = ceil($totalreg / $qnt_result_pg);
    


    $max_links = 2;

echo "
<nav aria-label='Page navigation example'>
    <ul class='pagination pagination-sm justify-content-center'>
        <li class='page-item'><span class='page-link'>Total de registros: ".$totalreg." </span></li> 
        <li class='page-item'><a class='page-link' href='listar.php?pagina=1&txt_pesquisa=".$txt_pesquisa."'>Primeira</a></li>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
          
       echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=".$pag_ant."&txt_pesquisa=".$txt_pesquisa."'>".$pag_ant."</a></li>";
      
         }
    }
 echo "
    <li class='page-item active' aria-current='page'>
        <a class='page-link' href='#'>".$pagina."</a>
    </li>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if ($pag_dep <= $quantidade_pg) {          
            echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=".$pag_dep."&txt_pesquisa=".$txt_pesquisa."'>".$pag_dep."</a></li>";
        }
    }

   echo"
    <li class='page-item'><a class='page-link' href='listar.php?pagina=".$quantidade_pg."&txt_pesquisa=".$txt_pesquisa."'>Última</a></li>
    </ul>
</nav>
</div>
</div>";



}  else {
    echo "<p style='color: #f00;'> Nenhum produto encontrado!</p>";    
}
}  else {
    echo "<p style='color: #f00;'> Nenhum produto encontrado!</p>";    
}
    
include_once ("../include/RodapeSistema.php");
    
    
?>


    