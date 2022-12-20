<?php
// /*Mostra as Conexões */

// $linhas = file("ConexaoStringMySQLi.txt");

// foreach ($linhas as $linha) { //loop em todas as linhas
//     $result[] = $linha;
// }

// fclose($arquivo);
// print_r($result);


// $server  = $result[1];
// $usuario = $result[1];
// $senha   = $result[2];
// $banco   = $result[3];

// echo $result[1];

     $servername = "localhost";
     $username = "root";
     $password = "usbw";
     $dbname = "pizzaria";  

    // $servername = $server;
    // $username   = $usuario;
    // $password   = $senha;
    // $dbname     = $banco;

    $conexao = new mysqli($servername, $username, $password, $dbname);
    if ($conexao->connect_error) 
    {
        die("Connection failed: " . $conexao->connect_error);
    }

    // Troquei o banco da (test) para fazer alguns test no cadastro de pedidos
    // Banco Original: $dbname = "pizzaria";  
    
    // $servername = "localhost";
    //     $username = "root";
    //   $password = "usbw";
    //   $dbname = "pizzaria";  
    //   $conexao = new mysqli($servername, $username, $password, $dbname);
    //   if ($conexao->connect_error) 
    //   {
    //       die("Connection failed: " . $conexao->connect_error);
    //    }



?>

