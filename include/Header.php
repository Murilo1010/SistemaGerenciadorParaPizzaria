<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="keywords" content="Pizzaria, Pizzas">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="estilo.css" type="text/css" rel="stylesheet" >
<link rel="shortcut icon" href="Imagens/favicon.ico" type="image/x-icon">
<title>Sistema Gerenciador Para Pizzaria</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

#logo {
    width: 40px;
    height: 40px;
}

.icones {
    width: 50px;
    height: 50px;
}


</style>



<script>
var index = 0;
carousel();
function carousel() {
var i;
var x = document.getElementsByClassName("slide");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
index++;
if (index > x.length) { index = 1 }
x[index - 1].style.display = "block";
setTimeout(carousel, 2000); //Imagem é trocada a cada 2 segundos
}
</script>

</head>
<body>
<div class="navbar">
  <a href="index.php">Página Incial</a>
  <a href="SobreNos.php">Sobre Nós</a>
  <div class="dropdown">
    <button class="dropbtn">Produtos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Pizza.php">Pizzas</a>
      <a href="Bebidas.php">Bebidas</a>
    </div>
  </div>
  <a href="Contatos.php"><i class="fa fa-phone" aria-hidden="true"></i>Contatos</a>
  <a href="Sistema.php"><i class="fa fa-sign-in" aria-hidden="true" class="icones"></i>Login</a>
  <a href="#" class="w3-right"><img src="Imagens/favicon.jpeg" id="logo"> </a>

</div>