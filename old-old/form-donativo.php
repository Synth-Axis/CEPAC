<?php include 'includes/head.php'; ?>
<div id="grey">
    <?php include 'includes/header.php'; ?>
</div>

<section id="about" class="top">
    <div class="banner banner-main">
        <div class="pellicle pellicle-main"></div>
        <div class="main-title">
            <h1>APOIAR</h1>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p style="text-align: left;">PORQUE É QUE O SEU APOIO É IMPORTANTE?</p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                    <p style="margin-left: 0.5rem;">Ao fazer o seu donativo está a contribuir para a construção dos projetos de vida e integração de cerca de 903 pessoas
                        imigrantes acompanhadas atualmente pelo CEPAC e que beneficiam das nossas diversas respostas e intervenção.</p>
                </div>
                <div class="infos-apoio">
                    <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                    <p style="margin-left: 0.5rem;">Somos uma instituição ao serviço da pessoa imigrante, com 30 anos de presença e proximidade junto das pessoas que
                        vivem em situações de maior vulnerabilidade e exclusão;</p>
                </div>
                <div class="infos-apoio">
                    <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                    <p style="margin-left: 0.5rem;">Contribuímos para a construção de um projeto de vida digna e feliz da pessoa imigrante em situação de vulnerabilidade;</p>
                </div>
                <div class="infos-apoio">
                    <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                    <p style="margin-left: 0.5rem;">Somos uma obra social dos Missionários do Espírito Santo que coloca as periferias no centro, dedicando-se a não deixar
                        ninguém para trás ou segundo plano.</p>
                </div>
            </div>
        </div>
        <div id="donative-form" class="begin-text1">
            <div class="bigparagraph bold">
                <p style="text-align: left;">PODEMOS CONTAR CONSIGO?</p>
            </div>
        </div>
        <div class="begin-text1 pad0">
            <div class="div-btn-apoio">
                <div class="btns-apoio  padtp">
                    <a href="donativos.php#donative">
                        <div class="background-blue">
                            DONATIVO
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="consignacao.php#consigne">
                        <div class="background-brown">
                            CONSIGNAÇÃO DE IRS/IVA
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="heranca.php#herance">
                        <div class="background-brown">
                            HERANÇA
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="pgto-tribunal.php#pgto">
                        <div class="background-brown">
                            PAGAMENTOS AO TRIBUNAL
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="eventos-solidarios.php#events">
                        <div class="background-brown">
                            EVENTOS SOLIDÁRIOS
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="voluntariado.php">
                        <div class="background-brown">
                            VOLUNTARIADO
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="boutique-bu-gosta.php">
                        <div class="background-brown">
                            DOAÇÃO DE BENS
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p style="color: #0099d5;">DONATIVO</p>
            </div>
            <div class="paragraph-apoio padtp">
                <form>
                    <div>
                        <p class="destaque-form">DADOS</p>
                    </div>
                    <!-- Dados nome e sobrenome -->
                    <div class="labels">
                        <label class="label-name" for="name">Nome*</label>
                        <label class="label-name" for="nickname">Sobrenome*</label>
                    </div>
                    <div class="form-donate-name">
                        <input class="form-donate" type="text" name="name" id="" required>
                        <input class="form-donate" type="text" name="nickname" id="" required>
                    </div>
                    <!-- dados instituição -->
                    <div class="labels">
                        <label class="label-institute" for="institute">Nome da Instituição(opcional)</label>
                    </div>
                    <div class="form-donate-name">
                        <input class="form-donate1" type="text" name="institute" id="">
                    </div>
                    <!-- dados nif/vat -->
                    <div class="labels">
                        <label class="label-nif" for="institute">NIF/VAT(opcional)</label>
                    </div>
                    <div class="form-donate-name">
                        <input class="form-donate1" type="text" name="nif" id="">
                    </div>
                    <!-- dados morada -->
                    <div class="labels">
                        <label class="label-address" for="address">Morada*</label>
                        <label class="label-address" for="country">País/Região*</label>
                    </div>
                    <div class="form-donate-name">
                        <input class="form-donate" type="text" name="address" id="" required>
                        <input class="form-donate" type="text" name="country" id="" required>
                    </div>
                    <!-- dados telefone e email -->
                    <div class="labels">
                        <label class="label-personal" for="phone">Telefone(opcional)</label>
                        <label class="label-personal" for="email">Endereço de email*</label>
                    </div>
                    <div class="form-donate-name">
                        <input class="form-donate" type="text" name="phone" id="">
                        <input class="form-donate" type="text" name="email" id="" required>
                    </div>
                    <!-- dados doação anonima e obs -->
                    <div class="anonima-obs">
                        <div class="info-add resp">
                            <div class="add-info">
                                <p class="destaque-form">DOAÇÃO ANÓNIMA</p>
                            </div>
                            <div class="info-add add-info resp">
                                <input class="form-check" type="checkbox" name="donate-anon" id="">
                                <p class="optional">Se pretende enviar a doação anónima, marque esta opção. (opcional) </p>
                            </div>
                        </div>

                        <div class="info-add wid50  resp">
                            <div class="add-info">
                                <p class="destaque-form">INFORMAÇÂO ADICIONAL</p>
                            </div>
                            <div class="info-add add-info">
                                <textarea class="message-donate optional" cols="30" rows="3" name="message" id="message" placeholder="Por favor, preencha com informação adicional se necessário. Pode indicar se deseja que o seu donativo seja aplicado a um projeto em concreto." required=""></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- dados resumo e pagamento -->

                    <div class="payment-zone">
                        <div class="payment-zone-left">
                            <div>
                                <p class="destaque-form">RESUMO DO PAGAMENTO</p>
                            </div>
                            <div class="resume">
                                <div class="resume-value">
                                    <div class="resume-line line1">
                                        <p class="resume-p"></p>
                                        <p class="resume-p">Subtotal</p>
                                    </div>
                                    <div class="resume-line line2">
                                        <p class="resume-p">Doação<strong class="str-b"> x1</strong></p>
                                        <p class="resume-p">30,00€</p>
                                    </div>
                                    <div class="resume-line line3">
                                        <p class="resume-p">Subtotal</p>
                                        <p class="resume-p"><strong class="str-b">30,00€</strong></p>
                                    </div>
                                    <div class="resume-line line4">
                                        <p class="resume-p"><strong class="str-b">Total</strong></p>
                                        <p class="resume-p"><strong class="str-b">30,00€</strong></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                            <div class="payment-zone-right">
                                <div class="payments">
                                    <div class="header-payment">
                                        <input type="radio" name="" id="" checked>
                                        <img class="pay-card" src="./images/master-card.png" alt="" srcset="">
                                        <img class="pay-card" src="./images/visa.png" alt="" srcset="">
                                        <p>Cartão de Crédito</p>
                                    </div>
                                    <form action="">
                                        <div class="payment-body">
                                            <!-- numero do cartão -->
                                            <div class="labels-payment">
                                                <label class="label-card" for="card">Número do Cartão*</label>
                                            </div>
                                            <div class="form-pay">
                                                <input class="form-payment" type="text" name="card" id="" required placeholder="   1234 1234 1234 1234">
                                            </div>
                                            <!-- data validade codigo segurança -->
                                            <div class="labels-payment">
                                                <label class="label-card-date" for="date-val">Data de Validade*</label>
                                                <label class="label-card-date" for="country">Cód. de Segurança (CVC)*</label>
                                            </div>
                                            <div class="form-donate-name">
                                                <input class="form-payment date-val" type="text" name="date-val" id="" required placeholder="   MM/AA">
                                                <input class="form-payment date-val" type="text" name="country" id="" required placeholder="   MM/AA">
                                            </div>
                                            <!-- métodos de pagamento -->
                                            <div class="select-payment">
                                                <input type="radio" name="" id="">
                                                <img class="pay-met" src="./images/paypal.png" alt="" srcset="">
                                                <p class="parag-pay">PayPal</p>
                                            </div>
                                            <div class="select-payment">
                                                <input type="radio" name="" id="">
                                                <img class="pay-met" src="./images/tb.png" alt="" srcset="">
                                                <p class="parag-pay">Transferência Bancária</p>
                                            </div>
                                            <div class="select-payment">
                                                <input type="radio" name="" id="">
                                                <img class="pay-met" src="./images/mb.png" alt="" srcset="">
                                                <p class="parag-pay">Referência Multibanco</p>
                                            </div>
                                            <div class="select-payment">
                                                <input type="radio" name="" id="">
                                                <img class="pay-met1" src="./images/mb-way.png" alt="" srcset="">
                                                <p class="parag-pay">MbWay</p>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- politica de pprivacidade e finaizar pagamento -->
                                    <div class="policy-conclude">
                                        <div>
                                            <p class="policy">Os seus dados pessoais serão utilizados para os propósitos descritos na nossa <a href="politica-privacidade.php" target="_blank"><span class="color-blue">política de privacidade</span> e <span class="color-blue">política de cookies.</span></a></p>
                                        </div>
                                        <div class="flex-dir">
                                            <input class="policy-radio" type="radio" name="" id="">
                                            <p class="policy">Eu li e aceito os <a href="politica-privacidade.php" target="_blank"><span class="color-blue">termos e condições,</span> a <span class="color-blue">política de privacidade</span> e a <span class="color-blue">política de cookies do site</span></a>*.</p>
                                        </div>
                                        <div class="btn-payment">
                                            <a href="#" class="background-brown payment-btn"> FINALIZAR PAGAMENTO</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>



<?php include 'includes/footer.php'; ?>