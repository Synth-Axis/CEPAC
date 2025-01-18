<?php
// VIEW BANNER
$query = $db->prepare("SELECT * FROM banners WHERE tag = 'sup' ");
$query->execute();
$banner = $query->fetch(PDO::FETCH_ASSOC);
?>

<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
    <div class="pellicle pellicle-main"></div>
    <div class="main-title">
        <h1><?= $banner["title"]; ?></h1>
    </div>
</div>

<div class="container <?= ($currentPage == 'apoio.php') ? '' : 'border-bt';   ?>">
    <div class="begin-text1">
        <div class="bigparagraph bold">
            <p style="text-align: left;"><?= $content[167]["text"]; ?></p>
        </div>
        <div class=" texting paragraph-apoio">
            <div class="infos-apoio">
                <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                <p style="margin-left: 0.5rem;"><?= $content[168]["text"]; ?></p>
            </div>
            <div class="infos-apoio">
                <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                <p style="margin-left: 0.5rem;"><?= $content[169]["text"]; ?></p>
            </div>
            <div class="infos-apoio">
                <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                <p style="margin-left: 0.5rem;"><?= $content[170]["text"]; ?></p>
            </div>
            <div class="infos-apoio">
                <p><img style="width: 10px;" src="./images/direita-azul.png" alt=""></p>
                <p style="margin-left: 0.5rem;"><?= $content[171]["text"]; ?></p>
            </div>
        </div>
    </div>
    <div class="begin-text1">
        <div class="bigparagraph bold">
            <p style="text-align: left;">PODEMOS CONTAR CONSIGO?</p>
        </div>
    </div>
    <!-- ALTERAÇÕES -->
    <div class="apoios-wrapper">
        <div class="begin-text1 pad0">
            <div class="div-btn-apoio">
                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="javascript:void(0);" id="donativosLink">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/donativos.png" alt="Donativos">

                        </div>
                        <div>
                            <?= $content[173]["text"]; ?>
                        </div>

                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="javascript:void(0);" id="consignacaoLink">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/proconsignacoes.png" alt="Consignações">
                        </div>
                        <div>
                            <?= $content[188]["text"]; ?>
                        </div>

                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="javascript:void(0);" id="herancaLink">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/heranca.png" alt="Herança">
                        </div>
                        <div>
                            <?= $content[190]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="javascript:void(0);" id="pagamentosTribunalLink">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/pagamentos-tribunal.png" alt="Pagamentos ao Tribunal">
                        </div>
                        <div>
                            <?= $content[193]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio padtp">
                    <a class="btn-links" href="javascript:void(0);" id="eventosSolidariosLink">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/eventos-solidarios.png" alt="Eventos-Solidarios">
                        </div>
                        <div>
                            <?= $content[195]["text"]; ?>
                        </div>
                    </a>
                </div>


                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="voluntariado.php">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/voluntariado.png" alt="Voluntariado">
                        </div>
                        <div>
                            <?= $content[197]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a class="btn-links" href="boutique-bu-gosta.php">
                        <div class="apoio-icons-container">
                            <img class="apoio-icons" src="./images/apoio/doacao-bens.png" alt="Doação de Bens">
                        </div>
                        <div>
                            <?= $content[198]["text"]; ?>
                        </div>

                    </a>
                </div>
            </div>


            <!-- Hidden about section content -->

            <!-- DONATIVOS -->
            <div id="aboutDonativos" style="display: none; margin-top: 1rem;">
                <div class="apoio-container">
                    <div class="bigparagraph bold">
                        <p class="white"><?= $content[173]["text"]; ?></p>
                    </div>
                    <div class="paragraph-apoio flex-content padtp">
                        <div class="text-apoio1">
                            <p class="destaque white"><?= $content[174]["text"]; ?></p>
                            <p class="white"><?= $content[175]["text"]; ?></p>
                        </div>
                        <div class="text-apoio1">
                            <p class="destaque white"><?= $content[176]["text"]; ?></p>
                            <p class="white"><?= $content[177]["text"]; ?></p>
                        </div>
                    </div>
                    <div class="apoios-about-container">
                        <div class="cards-apoio">
                            <div class="bigparagraph bold white">
                                <p>FAÇA O SEU DONATIVO AQUI (basta fazer scan ao QR Code através da app MBWAY)</p>
                                <img src="images/qrcode.png" alt="QR Code" style="max-width:320px; margin-top: 2rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- CONSIGNACAO -->
            <div id="aboutConsignacao" style="display: none;">
                <div class="apoio-container">
                    <div class="bigparagraph bold">
                        <p class="white"><?= $content[188]["text"]; ?></p>
                    </div>
                    <div class=" texting paragraph-consig">
                        <p style="color: #ffffff !important;"><?= $content[189]["text"]; ?>
                        </p>
                    </div>

                </div>
            </div>


            <!-- HERANCA -->
            <div id="aboutHeranca" style="display: none;">
                <div class="apoio-container">
                    <div class="bigparagraph bold">
                        <p class="white"><?= $content[190]["text"]; ?></p>
                    </div>
                    <div class=" texting paragraph-consig">
                        <p style="color: #ffffff !important;"><?= $content[191]["text"]; ?>
                            <a href="contactos.php#contacts"><span class="color-blue str-b under"><?= $content[192]["text"]; ?></span></a>
                        </p>
                    </div>
                </div>
            </div>


            <!-- PAGAMENTOS AO TRIBUNAL -->

            <div id="aboutPagamentosTribunal" style="display: none;">
                <div class="apoio-container">
                    <div class="bigparagraph bold">
                        <p class="white"><?= $content[193]["text"]; ?></p>
                    </div>
                    <div class=" texting paragraph-consig">
                        <p style="color: #ffffff !important;"><?= $content[194]["text"]; ?></p>
                    </div>
                </div>
            </div>



            <!-- EVENTOS -->
            <div id="aboutEventos" style="display: none;">
                <div class="apoio-container">
                    <div class="bigparagraph bold">
                        <p class="white"><?= $content[195]["text"]; ?></p>
                    </div>
                    <div class="texting paragraph-consig">
                        <p style="color: #ffffff !important;"><?= $content[196]["text"]; ?></p>
                    </div>
                </div>
            </div>