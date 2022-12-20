

<?php
// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";



// Receber o id
$id = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);

// Acessa o IF quando a variavel ID possui valor
if (!empty($id)) { 

    $query_produto = "SELECT usr.id_produto, usr.sabor, usr.preco
            FROM produto AS usr
            WHERE usr.id_produto=:id_produto LIMIT 1";
    $result_produto = $conn->prepare($query_produto);
    $result_produto->bindParam(':id_produto', $id );
    $result_produto->execute();

    if (($result_produto) and ($result_produto->rowCount() != 0)) {
        $row_produto = $result_produto->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $row_produto];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum produto encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum produto encontrado!</div>"];
}

echo json_encode($retorna);
