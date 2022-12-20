<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Cadastrar no BD na primeira tabela


try{
    $query_cliente = "INSERT INTO cliente (nome, CPF, Celular, Telefone_Fixo) VALUES (:nome, :CPF, :Celular, :Telefone_Fixo)";
    $cad_cliente = $conn->prepare($query_cliente);
    $cad_cliente->bindParam(':nome', $dados['nome']);
    $cad_cliente->bindParam(':CPF', $dados['CPF']);
    $cad_cliente->bindParam(':Celular', $dados['Celular']);
    $cad_cliente->bindParam(':Telefone_Fixo', $dados['Telefone_Fixo']);

    $cad_cliente->execute();

    if ($cad_cliente->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut ' role='alert'>Cliente cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Cliente não cadastrado!</div>"];
    }

} catch(PDOException $e){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Cliente não cadastrado</div>"];
 
  }

echo json_encode($retorna);
