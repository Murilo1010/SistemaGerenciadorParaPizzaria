<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber o id do regitro
$id = filter_input(INPUT_GET, "id_produto", FILTER_SANITIZE_NUMBER_INT);

//$id = "";

if (!empty($id)) {
    $query_produto = "DELETE FROM produto WHERE id_produto=:id";
    $del_produto = $conn->prepare($query_produto);
    $del_produto->bindParam(':id', $id);

    if ($del_produto->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut' role='alert'>Produto apagado com sucesso!</div>"];       
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Produto não apagado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Nenhum produto encontrado!</div>"];
}

echo json_encode($retorna);
