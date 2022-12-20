
// Cadastrar registro em duas tabelas no BD
const cadclienteForm = document.getElementById("cad-cliente-form");

// Receber o SELETOR da janela modal
const cadclienteModal = new bootstrap.Modal(document.getElementById("cadclienteModal"));

// Somente acessa o IF quando existir o SELETOR "cad-cliente-form"
if (cadclienteForm) {
  
    // Aguardar o cliente clicar no botao cadastrar
cadclienteForm.addEventListener("submit", async (e) => {
        // Nao permitir a atualizacao da pagina
        e.preventDefault();

        
        // validar o formulario

    if (!(document.getElementById("nome").value)) {

        document.getElementById("msgAlertaErro").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo nome!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErro").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("CPF").value)) {
        
        document.getElementById("msgAlertaErro").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo CPF!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErro").innerHTML = "";
        }, 2500 );             
        
    } else if (!(VerificaCPF(document.getElementById("CPF").value))) {
        document.getElementById("msgAlertaErro").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: CPF Inválido!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErro").innerHTML = "";
        }, 2500 );      
        
    } else if (!(document.getElementById("Celular").value)) {
        
        document.getElementById("msgAlertaErro").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Celular!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErro").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("Telefone_Fixo").value)) {
        
        document.getElementById("msgAlertaErro").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Telefone Fixo!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErro").innerHTML = "";
        }, 2500 ); 
    
    }
        //se passar da validação
    
    else {    
     
            const dadosForm = new FormData(cadclienteForm);
    
            document.getElementById("cad-cliente-btn").value = "Salvando...";
    
            const dados = await fetch("cadastrar.php", {
                method: "POST",
                body: dadosForm
            });
    
            const resposta = await dados.json();
    
            // Acessa o IF quando nao cadastrar com sucesso
            if (!resposta['status']) {
                document.getElementById("msgAlertaErro").innerHTML = resposta['msg'];
                document.getElementById("msgAlerta").innerHTML = "";
                setTimeout(function(){
                    document.getElementById("msgAlertaErro").innerHTML = "";
                  }, 2500 );    
            } else {
                document.getElementById("msgAlertaErro").innerHTML = "";
                document.getElementById("msgAlerta").innerHTML = resposta['msg'];
                cadclienteForm.reset();
                cadclienteModal.hide();
    
                    setTimeout(function(){
                        window.location.href = "listar.php?pagina=1";
                      }, 2500 );    
            }   
            document.getElementById("cad-cliente-btn").value = "Cadastrar";
        }   
  })
}



// Visualizar os dados do cliente
async function viscliente(id) {
    
const dados = await fetch('visualizar.php?id_cliente=' + id);
const resposta = await dados.json();

if (!resposta['status']) {
    document.getElementById('msgAlerta').innerHTML = resposta['msg'];
} else {
    document.getElementById('msgAlerta').innerHTML = "";
    const visModal = new bootstrap.Modal(document.getElementById('visclienteModal'));
    visModal.show();

    document.getElementById("idcliente").innerHTML = resposta['dados'].id_cliente;
    document.getElementById("nomecliente").innerHTML = resposta['dados'].nome;
    document.getElementById("cpfcliente").innerHTML = resposta['dados'].CPF;
    document.getElementById("celularcliente").innerHTML = resposta['dados'].Celular;
    document.getElementById("telefonefixocliente").innerHTML = resposta['dados'].Telefone_Fixo;

}


}


// Recuperar dados do CLIENTE para o formulario editar

const editclienteModal = new bootstrap.Modal(document.getElementById("editclienteModal"));

async function editclienteDados(id) {
    document.getElementById("msgAlertaErroEdit").innerHTML = "";

    const dados = await fetch('visualizar.php?id_cliente=' + id);
    const resposta = await dados.json();

    if (!resposta['status']) {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {      
        editclienteModal.show();
        document.getElementById("editid").value = resposta['dados'].id_cliente;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editCPF").value = resposta['dados'].CPF;
        document.getElementById("editcelular").value = resposta['dados'].Celular;
        document.getElementById("edittelefonefixo").value = resposta['dados'].Telefone_Fixo;
    }
}

// Editar os dados do CLIENTE no BD
const editclienteForm = document.getElementById("edit-cliente-form");
if (editclienteForm) {

    // Aguardar o cliente clicar no botao 
    editclienteForm.addEventListener("submit", async (e) => {
       // Nao permitir a atualizacao da pagina 
        e.preventDefault();


    // validar o formulario

    if (!(document.getElementById("editnome").value)) {
       
        document.getElementById("msgAlertaErroEdit").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo nome!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEdit").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("editCPF").value)) {

        document.getElementById("msgAlertaErroEdit").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo CPF!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEdit").innerHTML = "";
        }, 2500 );             
        
    } else if (!(VerificaCPF(document.getElementById("editCPF").value))) {

        document.getElementById("msgAlertaErroEdit").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: CPF Inválido!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEdit").innerHTML = "";
        }, 2500 );      
        
    } else if (!(document.getElementById("editcelular").value)) {

        document.getElementById("msgAlertaErroEdit").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Celular!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEdit").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("edittelefonefixo").value)) {

        document.getElementById("msgAlertaErroEdit").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Telefone Fixo!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEdit").innerHTML = "";
        }, 2500 ); 
    
    }
        //se passar da validação
    
    else {   

        const dadosForm = new FormData(editclienteForm);

        document.getElementById("edit-cliente-btn").value = "Salvando...";
       
        const dados = await fetch("editar.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();
       

            // Acessa o IF quando nao cadastrar com sucesso
            if (!resposta['status']) {

                document.getElementById("msgAlertaErroEdit").innerHTML = resposta['msg'];
                document.getElementById("msgAlerta").innerHTML = "";
                setTimeout(function(){
                    document.getElementById("msgAlertaErroEdit").innerHTML = "";
                  }, 2500 );    
            } else {

                
                document.getElementById("msgAlertaErroEdit").innerHTML = "";
                document.getElementById("msgAlerta").innerHTML = resposta['msg'];
                editclienteForm.reset();
                editclienteModal.hide();
    
                    setTimeout(function(){
                        window.location.href = "listar.php?pagina=1";
                      }, 2500 );    
            } 

        document.getElementById("edit-cliente-btn").value = "Salvar";
        }
    })
}

// Apagar o registro no BD
async function apagarclienteDados(id){

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");
    
    if(confirmar == true){
        const dados = await fetch('apagar.php?id_cliente='+ id);
        const resposta = await dados.json();
    
        if(!resposta['status']){
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            setTimeout(function(){
                window.location.href = "listar.php?pagina=1";
              }, 2500 ); 
        }else{
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            setTimeout(function(){
                window.location.href = "listar.php?pagina=1";
              }, 2500 ); 
        }
    }
    
}

//********************************* PRODUTO ***********************************//

// Cadastrar PRODUTO em duas tabelas no BD
const cadprodutoForm = document.getElementById("cad-produto-form");

// Receber o SELETOR da janela modal
const cadprodutoModal = new bootstrap.Modal(document.getElementById("cadprodutoModal"));

// Somente acessa o IF quando existir o SELETOR "cad-produto-for"
if (cadprodutoForm) {
  
    // Aguardar o cliente clicar no botao cadastrar produto
cadprodutoForm.addEventListener("submit", async (e) => {
        // Nao permitir a atualizacao da pagina
        e.preventDefault();

        // validar o formulario

    if (!(document.getElementById("sabor").value)) {

        document.getElementById("msgAlertaErroCadProd").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Sabor!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroCadProd").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("preco").value)) {
        
        document.getElementById("msgAlertaErroCadProd").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Preço!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroCadProd").innerHTML = "";
        }, 2500 );             
        
    } 
    
    //se passar da validação
    
    else {    
    
            const dadosForm = new FormData(cadprodutoForm);
    
            document.getElementById("cad-produto-btn").value = "Salvando...";
    
            const dados = await fetch("cadastrar.php", {
                method: "POST",
                body: dadosForm
            });
    
            const resposta = await dados.json();
            
              
            // Acessa o IF quando nao cadastrar com sucesso
            if (!resposta['status']) {
                document.getElementById("msgAlertaErroCadProd").innerHTML = resposta['msg'];
                document.getElementById("msgAlerta").innerHTML = "";
                setTimeout(function(){
                    document.getElementById("msgAlertaErroCadProd").innerHTML = "";
                  }, 2500 );    
            } else {
                document.getElementById("msgAlertaErroCadProd").innerHTML = "";
                document.getElementById("msgAlerta").innerHTML = resposta['msg'];
                cadprodutoForm.reset();
                cadprodutoModal.hide();
    
                    setTimeout(function(){
                        window.location.href = "listar.php?pagina=1";
                      }, 2500 );    
            }   
            document.getElementById("cad-produto-btn").value = "Cadastrar";
        }   
  })
}




// Visualizar os dados do produto
async function visproduto(id) {
    
    const dados = await fetch('visualizar.php?id_produto=' + id);
    
    const resposta = await dados.json();

   
    
    if (!resposta['status']) {
        document.getElementById('msgAlerta').innerHTML = resposta['msg'];
    } else {
        document.getElementById('msgAlerta').innerHTML = "";
        const visModal = new bootstrap.Modal(document.getElementById('visprodutoModal'));
        visModal.show();
                
        var precocorrigido = (resposta['dados'].preco).replace(".",",");

        document.getElementById("idproduto").innerHTML = resposta['dados'].id_produto;
        document.getElementById("saborproduto").innerHTML = resposta['dados'].sabor;
        document.getElementById("precoproduto").innerHTML = precocorrigido;
    }  
}

// Recuperar dados do PRODUTO para o formulario editar 

const editprodutoModal = new bootstrap.Modal(document.getElementById("editprodutoModal"));

async function editprodutoDados(id) {
    document.getElementById("msgAlertaErroEditProd").innerHTML = "";

    const dados = await fetch('visualizar.php?id_produto=' + id);
    const resposta = await dados.json();

    if (!resposta['status']) {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        editprodutoModal.show();

        var precocorrigido = (resposta['dados'].preco).replace(".",",");

        document.getElementById("editidproduto").value = resposta['dados'].id_produto;
        document.getElementById("editsabor").value = resposta['dados'].sabor;
        document.getElementById("editpreco").value = precocorrigido;
    }
}

// Editar os dados do PRODUTO no BD
const editprodutoForm = document.getElementById("edit-produto-form");
if (editprodutoForm) {

// Aguardar o cliente clicar no botao 
    editprodutoForm.addEventListener("submit", async (e) => {
    // Nao permitir a atualizacao da pagina 
     e.preventDefault();

      // validar o formulario

      if (!(document.getElementById("editsabor").value)) {
       
        document.getElementById("msgAlertaErroEditProd").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Sabor!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEditProd").innerHTML = "";
        }, 2500 ); 

    } else if (!(document.getElementById("editpreco").value)) {

        document.getElementById("msgAlertaErroEditProd").innerHTML = "<div class='alert alert-danger fadeOut' role='alert'>Erro: Necessário preencher o campo Preço!</div>";
        document.getElementById("msgAlerta").innerHTML = "";
        setTimeout(function(){
            document.getElementById("msgAlertaErroEditProd").innerHTML = "";
        }, 2500 );             
        
    }
        //se passar da validação
    
    else {      

        const dadosForm = new FormData(editprodutoForm);

        document.getElementById("edit-produto-btn").value = "Salvando...";

        const dados = await fetch("editar.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        // Acessa o IF quando nao cadastrar com sucesso

        if (!resposta['status']) {
            document.getElementById("msgAlertaErroEditProd").innerHTML = resposta['msg'];
            document.getElementById("msgAlerta").innerHTML = "";
            setTimeout(function(){
                document.getElementById("msgAlertaErroEditProd").innerHTML = "";
              }, 2500 );    
        } else {
            document.getElementById("msgAlertaErroEditProd").innerHTML = resposta['msg'];
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
                editprodutoForm.reset();
                editprodutoModal.hide();
    
                    setTimeout(function(){
                        window.location.href = "listar.php?pagina=1";
                      }, 2500 );    

        }

        document.getElementById("edit-produto-btn").value = "Salvar";
        }
    })
}

// Apagar o registro no BD
async function apagarprodutoDados(id){

    var confirmar = confirm("Tem certeza que deseja excluir o produto selecionado?");
    
    if(confirmar == true){
        const dados = await fetch('apagar.php?id_produto='+ id);
        const resposta = await dados.json();
    
        if(!resposta['status']){
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            setTimeout(function(){
                window.location.href = "listar.php?pagina=1";
              }, 2500 ); 
        }else{
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            setTimeout(function(){
                window.location.href = "listar.php?pagina=1";
              }, 2500 ); 
        }
    }
    
}



//********************************* VALIDAÇÃO CPF ***********************************//

function VerificaCPF(strCpf) {

    var soma;
    var resto;
    soma = 0;
    if (strCpf == "00000000000") {
        return false;
    }
    
    for (i = 1; i <= 9; i++) {
        soma = soma + parseInt(strCpf.substring(i - 1, i)) * (11 - i);
    }
    
    resto = soma % 11;
    
    if (resto == 10 || resto == 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }
    
    if (resto != parseInt(strCpf.substring(9, 10))) {
        return false;
    }
    
    soma = 0;
    
    for (i = 1; i <= 10; i++) {
        soma = soma + parseInt(strCpf.substring(i - 1, i)) * (12 - i);
    }
    resto = soma % 11;
    
    if (resto == 10 || resto == 11 || resto < 2) {
        resto = 0;
    } else {
        resto = 11 - resto;
    }
    
    if (resto != parseInt(strCpf.substring(10, 11))) {
        return false;
    }
    
    return true;
}


