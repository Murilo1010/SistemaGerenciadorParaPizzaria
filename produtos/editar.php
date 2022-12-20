<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

try{

    $precocorrigido = str_replace(",",".",$dados['preco']);

    // Editar no BD na primeira tabela
    $query_produto = "UPDATE produto SET sabor=:sabor, preco=:preco WHERE id_produto=:id_produto";
    $edit_produto = $conn->prepare($query_produto);
    $edit_produto->bindParam(':sabor', $dados['sabor']);
    $edit_produto->bindParam(':preco', $precocorrigido);
    $edit_produto->bindParam(':id_produto', $dados['id_produto']);

    $edit_produto->execute();

    if ($edit_produto->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut ' role='alert'>Produto editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Produto não editado!</div>"];
    }

} catch(PDOException $e){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Produto não editado</div>"];
 
}


echo json_encode($retorna);
