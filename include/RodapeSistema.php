    <!-- Inicio Modal cadastrar cliente -->
    <div class="modal fade" id="cadclienteModal" tabindex="-1" aria-labelledby="cadclienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadclienteModalLabel">Cadastrar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErro"></span>
                    <form class="row g-3" id="cad-cliente-form">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" autocomplete="off" placeholder="Nome completo">
                        </div>

                        <div class="col-12">
                            <label for="CPF" class="form-label">CPF</label>
                            <input type="text" name="CPF" class="form-control" id="CPF" autocomplete="off" placeholder="CPF (somente números)">
                        </div>

                        <div class="col-12">
                            <label for="Celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="Celular" name="Celular" autocomplete="off"  maxlength="9" placeholder="Telefone Celular (9 dígitos)">
                             
                        </div> 

                        <div class="col-12">
                            <label for="Telefone_Fixo" class="form-label">Telefone Fixo</label>
                            <input type="text" name="Telefone_Fixo" class="form-control" maxlength="8" id="Telefone_Fixo" autocomplete="off" placeholder="Telefone Fixo (8 dígitos)">
                        </div>                       

                        <div class="col-12">
                            <input type="submit" class="btn btn-outline-success btn-sm" id="cad-cliente-btn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal cadastrar cliente-->

    <!-- Inicio Modal visualizar cliente-->
    <div class="modal fade" id="visclienteModal" tabindex="-1" aria-labelledby="visclienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="visclienteModalLabel">Visualizar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="idcliente"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="nomecliente"></span></dd>

                        <dt class="col-sm-3">CPF</dt>
                        <dd class="col-sm-9"><span id="cpfcliente"></span></dd>

                        <dt class="col-sm-3">Celular</dt>
                        <dd class="col-sm-9"><span id="celularcliente"></span></dd>   

                        <dt class="col-sm-3">Tel. Fixo</dt>
                        <dd class="col-sm-9"><span id="telefonefixocliente"></span></dd>                        


                    </dl>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal visualizar cliente-->

    <!-- Inicio Modal editar cliente-->
    <div class="modal fade" id="editclienteModal" tabindex="-1" aria-labelledby="editclienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="editclienteModalLabel">Editar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgAlertaErroEdit"></span>

                    <form class="row g-3" id="edit-cliente-form">
                        <input type="hidden" name="id_cliente" id="editid">

                        <div class="col-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="editnome" placeholder="Nome completo">
                        </div>

                        <div class="col-12">
                            <label for="CPF" class="form-label">CPF</label>
                            <input type="text" name="CPF" class="form-control" id="editCPF" placeholder="CPF (somente números)">
                        </div>

                        <div class="col-12">
                            <label for="Celular" class="form-label">Celular</label>
                            <input type="text" name="Celular" class="form-control" id="editcelular" autocomplete="off" placeholder="Celular (9 dígitos)">
                        </div> 

                        <div class="col-12">
                            <label for="Telefone_Fixo" class="form-label">Telefone Fixo</label>
                            <input type="text" name="Telefone_Fixo" class="form-control" id="edittelefonefixo" autocomplete="off" placeholder="Telefone Fixo (8 dígitos)">
                        </div>                       

                        <div class="col-12">
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-cliente-btn" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal editar cliente-->

        
    <!-- Inicio Modal cadastrar produto -->
    <div class="modal fade" id="cadprodutoModal" tabindex="-1" aria-labelledby="cadprodutoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadprodutoModalLabel">Cadastrar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroCadProd"></span>
                    <form class="row g-3" id="cad-produto-form">
                        <div class="col-12">
                            <label for="sabor" class="form-label">Sabor</label>
                            <input type="text" name="sabor" class="form-control" id="sabor" autocomplete="off" placeholder="Sabor">
                        </div>

                        <div class="col-12">
                            <label for="preco" class="form-label">Preço (R$)</label>
                            <input type="text" name="preco" class="form-control" id="preco" autocomplete="off" placeholder="Preço R$ xx,xx">
                        </div>

                        <div class="col-12">
                            <input type="submit" class="btn btn-outline-success btn-sm" id="cad-produto-btn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal cadastrar produto-->

    <!-- Inicio Modal visualizar produto-->
    <div class="modal fade" id="visprodutoModal" tabindex="-1" aria-labelledby="visprodutoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="visprodutoModalLabel">Visualizar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVisProd"></span>
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="idproduto"></span></dd>

                        <dt class="col-sm-3">Sabor</dt>
                        <dd class="col-sm-9"><span id="saborproduto"></span></dd>

                        <dt class="col-sm-3">Preço (R$)</dt>
                        <dd class="col-sm-9"><span id="precoproduto"></span></dd>
                     


                    </dl>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal visualizar produto-->

    <!-- Inicio Modal editar produto-->
    <div class="modal fade" id="editprodutoModal" tabindex="-1" aria-labelledby="editprodutoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="editprodutoModalLabel">Editar produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgAlertaErroEditProd"></span>

                    <form class="row g-3" id="edit-produto-form">
                        <input type="hidden" name="id_produto" id="editidproduto">

                        <div class="col-12">
                            <label for="sabor" class="form-label">Sabor</label>
                            <input type="text" name="sabor" class="form-control" id="editsabor" placeholder="Entre com o sabor">
                        </div>

                        <div class="col-12">
                            <label for="preco" class="form-label">Preço (R$)</label>
                            <input type="text" name="preco" class="form-control" id="editpreco" placeholder="Preço R$ xx,xx">
                        </div>       

                        <div class="col-12">
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-produto-btn" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal editar produto-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

    <script src="../scripts/custom.js"></script>
</body>
</html>