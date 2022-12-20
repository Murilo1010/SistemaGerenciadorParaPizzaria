<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


// validar o formulario
try{

  // Editar no BD na primeira tabela
   
    $query_cliente = "UPDATE cliente SET nome=:nome, CPF=:CPF, Celular=:Celular, Telefone_Fixo=:Telefone_Fixo WHERE id_cliente=:id_cliente";
    $edit_cliente = $conn->prepare($query_cliente);
    $edit_cliente->bindParam(':nome', $dados['nome']);
    $edit_cliente->bindParam(':CPF', $dados['CPF']);
    $edit_cliente->bindParam(':Celular', $dados['Celular']);
    $edit_cliente->bindParam(':Telefone_Fixo', $dados['Telefone_Fixo']);
    $edit_cliente->bindParam(':id_cliente', $dados['id_cliente']);

    $edit_cliente->execute();

    if ($edit_cliente->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut ' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Usuário não editado!</div>"];
    }

} catch(PDOException $e){

    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Usuário não foi editado!</div>"];
}

echo json_encode($retorna);
