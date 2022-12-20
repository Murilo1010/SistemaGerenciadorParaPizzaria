

<?php
// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber o id
$id = filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);



// Acessa o IF quando a variavel ID possui valor
if (!empty($id)) { 
    $query_cliente = "SELECT usr.id_cliente, usr.nome, usr.CPF, usr.Celular, usr.Telefone_Fixo
            FROM cliente AS usr
            WHERE usr.id_cliente=:id_cliente LIMIT 1";
    $result_cliente = $conn->prepare($query_cliente);
    $result_cliente->bindParam(':id_cliente', $id);
    $result_cliente->execute();

    if (($result_cliente) and ($result_cliente->rowCount() != 0)) {
        $row_cliente = $result_cliente->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $row_cliente];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}

echo json_encode($retorna);
