<?php
// /*Mostra as Conexões */

// $linhas = file("ConexaoStringMySQLi.txt");

// foreach ($linhas as $linha) { //loop em todas as linhas
//     $result[] = $linha;
// }

// fclose($arquivo);
// print_r($result);


// $server  = $result[0];
// $usuario = $result[1];
// $senha   = $result[2];
// $banco   = $result[3];



 $host = "localhost";
$user = "root";
$pass = "usbw";
$dbname = "pizzaria";

// $host = $server ;
// $user = $usuario;
// $pass = $senha;
// $dbname = $banco;

$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass, $opcoes);

    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}