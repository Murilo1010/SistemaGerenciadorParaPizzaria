<!DOCTYPE html>
<html>
<head>
<title>Boa Pizza</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="Imagens/favicon.ico" type="image/x-icon">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("Imagens/imagem_pizzaria.jpeg");
  height: 80%;
}

.menu { 
  display: none;
}
</style>
</head>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-green">
    <div class="w3-col s2">
     <a href="#inicio" class="w3-button w3-block w3-green w3-hover-white"><i class="w3-xlarge fa fa-home"></i> INICIO</a>
    </div>
    <div class="w3-col s2">
      <a href="#cardapio" class="w3-button w3-block w3-green w3-hover-white"><i class="w3-xlarge fa fa-cutlery" ></i> PIZZAS</a>
    </div>
    <div class="w3-col s2">
      <a href="#bebidas" class="w3-button w3-block w3-green w3-hover-white"><i class="w3-xlarge fa fa-coffee"></i> BEBIDAS</a>
    </div>
    <div class="w3-col s2">
      <a href="#contato" class="w3-button w3-block w3-green w3-hover-white"><i class="w3-xlarge fa fa-address-card" ></i> CONTATO</a>
    </div>
    <!-- <div class="w3-col s2">
      <a href="#sobre" class="w3-button w3-block w3-green w3-hover-white">SOBRE</a>
    </div> -->
    <div class="w3-col s2">
      <a href="./telalogin/telalogin.php" class="w3-button w3-block w3-green w3-hover-white"><i class="w3-xlarge fa fa-sign-in" ></i> FAÇA LOGIN</a>
    </div>
    
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-white" id="inicio">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-green w3-round-xxlarge">Aberto das 18:00 as 23:00 </span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-red w3-large">


    <!-- Menu Container -->
<div class="w3-container" id="cardapio">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-green w3-wide w3-round-xxlarge">Pizzas</span></h5>
  
      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Muçarela</span></h5>
      <p class="w3-text-grey">Esse sabor leva nada mais nada menos que o queijo muçarela em abundância, molho de tomate fresco, azeitona, rodelas de tomate e orégano!</p>
      <h5 class="w3-text-green">R$39,90</h5><br>
      
      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Calabresa</span></h5>
      <p class="w3-text-grey">O recheio é preparado com queijo, molho de tomate, calabresa em rodelas, cebola, tomate picado, azeite e orégano. A azeitona também pode ser acrescentada!</p>
      <h5 class="w3-text-green">R$39,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Portuguesa</span></h5>
      <p class="w3-text-grey">É feita com queijo, azeitona verde ou preta, ovo cozido, presunto cozido, cebola, ervilha, molho de tomate e azeite. Também há preparações que são acrescentadas milho verde, pimentão e orégano!</p>
      <h5 class="w3-text-green">R$39,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Quatro Queijos</span></h5>
      <p class="w3-text-grey">Assim como o nome já diz, essa pizza é preparada com quatro queijos diferentes, como muçarela, gorgonzola, parmesão e catupiry.</p>
      <h5 class="w3-text-green">R$39,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Frango Com Catupiry</span></h5>
      <p class="w3-text-grey">A receita costuma levar basicamente queijo muçarela, frango, catupiry, sálvia e molho de tomate. Confesso que é uma das minhas preferidas!</p>
      <h5 class="w3-text-green">R$39,90</h5><br>
    </div>
</div>
    <div class="w3-container" id="bebidas">
    <div class="w3-content" style="max-width:700px">

    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-green w3-wide w3-round-xxlarge">Bebidas</span></h5>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Coca-Cola</span></h5>
      <p class="w3-text-grey">A Coca-Cola foi criada há mais de 130 anos e originalmente, o extrato da folha de coca era usado em sua fórmula</p>
      <h5 class="w3-text-green">R$9,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Pepsi</span></h5>
      <p class="w3-text-grey">Criada em 1893,Além do tradicional sabor de cola, é possível encontrar a Pepsi nos sabores limão e cereja</p>
      <h5 class="w3-text-green">R$9,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Sprite</span></h5>
      <p class="w3-text-grey">Certamente a Sprite é um refrigerante bastante popular ao redor do mundo por conta de seu sabor</p>
      <h5 class="w3-text-green">R$9,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Fanta</span></h5>
      <p class="w3-text-grey">Certamente a Fanta é um dos refrigerantes mais populares do mundo. É improvável que você já não tenha provado ao menos um dos sabores deste refrigerante</p>
      <h5 class="w3-text-green">R$9,90</h5><br>

      <h5><span class="w3-tag w3-green w3-text-white w3-round-large">Guaraná Antarctica</span></h5>
      <p class="w3-text-grey">O Guaraná Original do Brasil</p>
      <h5 class="w3-text-green">R$9,90</h5><br>
      
    </div>  
  </div>
</div>

<!-- Area de Pedidos -->

<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-green w3-wide w3-round-xxlarge" id="contato">Peça pelo WhatsApp</span></h5>
<h4 class= "w3-center">(19)9 9999-9999</h4>

<!-- About0 Container -->
<div class="w3-container" id="sobre">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-red w3-wide">Sobre a Pizzaria</span></h5>
      <p> Fundada Por Alunos Da Etec no curso de Desenvolvimento de Sistemas</p>
    </div>

<!-- End page content -->
</div>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "w3-green";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-green");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-green";
}
document.getElementById("myLink").click();
</script>

</body>
</html>