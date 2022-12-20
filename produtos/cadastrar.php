<?php

// Incluir a conexao com o banco de dados
include_once "../include/ConexaoBancoPDO.php";

// Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Cadastrar no BD na primeira tabela


try{

    $precocorrigido = str_replace(",",".",$dados['preco']);

    $query_produto = "INSERT INTO produto (sabor, preco) VALUES (:sabor, :preco)";
    $cad_produto = $conn->prepare($query_produto);
    $cad_produto->bindParam(':sabor', $dados['sabor']);
    $cad_produto->bindParam(':preco', $precocorrigido);
    
    $cad_produto->execute();

    if ($cad_produto->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success fadeOut ' role='alert'>Produto cadastrado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Produto não cadastrado!</div>"];
    }

} catch(PDOException $e){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger fadeOut' role='alert'>Erro: Produto não cadastrado</div>"];
 
  }

echo json_encode($retorna);
