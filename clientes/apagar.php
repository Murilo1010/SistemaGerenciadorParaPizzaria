<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber o id do regitro
$id = filter_input(INPUT_GET, "id_cliente", FILTER_SANITIZE_NUMBER_INT);

//$id = "";

if (!empty($id)) {
    $query_cliente = "DELETE FROM cliente WHERE id_cliente=:id";
    $del_cliente = $conn->prepare($query_cliente);
    $del_cliente->bindParam(':id', $id);

    if ($del_cliente->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut' role='alert'>Usuário apagado com sucesso!</div>"];       
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Usuário não apagado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}

echo json_encode($retorna);
