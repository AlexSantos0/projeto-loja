
<div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-7 col-12">
            <div class="padrao dados mt-3">
                <form id="dadosForm" name="formulario" class="formulario g-3 needs-validation" method="POST" novalidate>
                <div class="dados-comprador">
                    <h3>Dados do comprador</h3>

                    <label for="nome" class="form-label">Nome completo</label>
                    <input type="text" data-type-validation="name" class="form-control" id="nome" name="name" required>

                    <label for="email" class="form-label">Email</label>
                    <input type="email" data-type-validation="email" class="form-control" id="email" name="email" required>

                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" data-type-validation="cpf" class="form-control" id="cpf" name="cpf" data-mask="000.000.000-00" required>
                </div>
                <div class="endereco mt-3">
                    <h3>Endereço de entrega</h3>

                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" data-type-validation="cep" class="form-control" data-mask="00000-000" id="cep" name="cep" required>

                    <label for="log" class="form-label">Logradouro</label>
                    <input type="text" data-type-validation="logradouro" class="form-control" id="log" name="logradouro" required>

                    <label for="compl" class="form-label">Complemento</label>
                    <input type="text" data-type-validation="complmento" class="form-control" id="compl" name="complemento" required>

                    <div class="bairr-cida d-flex mt-1">
                        <div class="bairro-i" style="text-align:justify">
                            <label for="endereco">Bairro</label>
                            <input type="text" data-type-validation="bairro" class="form-control" id="bairro" name="bairro" required>
                        </div>  
                    
                        <div class="cidade-i" style="text-align:justify">
                            <label for="endereco" >Cidade</label>
                            <input type="text" data-type-validation="cidade" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="uf-i col-2">
                            <label for="endereco">UF</label>
                            <input type="text" class="form-control" data-type-validation="estado" id="estado" name="estado" required>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="info-pagamento mt-3 ">
                    <h3>Formas de pagamento</h3>
                    <div class="methods-payment ">
                        <div class="pagamentos">
                            <!-- cartao -->
                            <div class="cartao-pagamento" type="button" style="min-width: 100px" data-bs-toggle="collapse" data-bs-target="#card-credit" aria-expanded="false" aria-controls="card-credit">
                                <img src="assets/cartao.png" alt="Imagem card-method">
                            </div>
                            <!-- pix -->
                            <div class="pix-pagamento" type="button" style="min-width: 100px" data-bs-toggle="collapse" data-bs-target="#pix" aria-expanded="false" aria-controls="pix">
                                <img src="assets/pix.png" alt="Imagem pix-method">
                            </div>
                            <!-- boleto -->
                            <div class="boleto-pagamento" type="button" style="min-width: 100px" data-bs-toggle="collapse" data-bs-target="#boleto" aria-expanded="false" aria-controls="boleto">
                                <img src="assets/boleto.png" alt="Imagem boleto-method">
                            </div>
                        </div>
                            <!-- PIX -->
                            <div class="collapse" id="pix" >
                                <div class="pix-qrcode mt-3">
                                    <button id="botao-pix" onclick="genereteQR(), insertCont(),contRegressive()" class="botao-pix btn-success mb-2">Gerar QRcode</button>
                                    <img id="qrcode">
                                </div>
                                <div class="timer">
                                    <p id="cont"></p>
                                </div>
                            </div>
                        <!-- CARTÃO -->
                        <div class="collapse mt-4 mb-4" id="card-credit">
                            <div class="card card-body">
                                    <label for="name-card">Nome no cartão</label>
                                    <input type="text" class="form-control" data-type-validation="name-card" name="nome-card" id="estado" required> 

                                    <label for="number-card">Número do cartão</label>
                                    <input type="text" class="form-control" data-mask="0000 0000 0000 0000" data-type-validation="number-card" name="numero-card" id="numero-card" required>

                                    <div class="val-cvv mt-1">
                                        <div class="validade">
                                            <label for="validade">Validade</label>
                                            <input type="text" class="form-control" data-mask="00/00" data-type-validation="validade" name="validade" id="validade" required>
                                        </div>
                                        <div class="cvv">
                                            <label for="cvv">CVV</label> <br>
                                            <input type="text" data-mask="000"  class="form-control" data-type-validation="cvv" name="cvv" id="cvv" required>
                                        </div>
                                    </div>
                            </div>
                            <button class="btn-primary mt-4" type="submit" id="conf-pagamento">Confirmar Pagamento</button>
                        </div>
                        
                        <!-- BOLETO -->
                        <div class="collapse " id="boleto">
                            <h2>Boleto</h2>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <div class="resumo  col-lg-4 col-md-12 col-sm-12 mt-3">
            <div class="padrao pedido">
                <h4>Resumo do pedido</h4>
                <?php foreach ($items as $item):?>
               <div class="itens">
                    <div class="nome-desc col-9">
                        <p class="nome-item"><?php $resumo = $item [0]; echo $resumo['name']; ?></p>  
                        <p class="descricao"><?php $resumo = $item [0]; echo $resumo['description']; ?></p> 
                    </div>
                    <div class="valor">
                        <p class="valor-item" id="valor">
                            <?php 
                                $resumo = $item [0];
                                $valor = number_format(($resumo['amout']/100),2,',','');
                                echo "R$ ". $valor;
                            ?>
                        </p>                                                                       
                    </div>
               </div>
               <?php endforeach;?>
               <hr>
               <div class="total-pedido">
                <h5>Total do Pedido</h5>
                <h5 id="valtotal"></h5>
               </div>

            </div>
        </div>
    </div>
</div>
<div class="recebe"></div>