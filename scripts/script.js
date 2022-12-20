/*Função para alterar entre as abas*/

function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}

/*Função para mostrar e esconder a div de endereco */
function text(x) {
    if (x == 1) document.getElementById("endereco").style.display = "block";
    else document.getElementById("endereco").style.display = "none";
    return;
}


/*Cadastrar Itens do pedido */
const form_CadastroItem = document.getElementById("formCadastroItem");
if(form_CadastroItem) {
   form_CadastroItem.addEventListener("submit" , async (event) => {
     event.preventDefault();
      /*Receber dados do formulario */
     const dadosform =  new FormData(form_CadastroItem)

   const dados =   await fetch("cadastroitempedidoAction.php", {
      method: "POST",
      body: dadosform
     });
     const resposta = await dados.json();

     if(resposta['status']) {
      document.getElementById("msgAlerta").innerHTML = resposta['msg'];
      form_CadastroItem.reset();
    } else {
       document.getElementById("msgAlerta").innerHTML = resposta['msg'];
     }
});
}

//////////////////////
