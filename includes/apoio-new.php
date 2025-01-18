<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'sup' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>

    <div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
        <div class="pellicle pellicle-main"></div>
        <div class="main-title">
            <h1><?= $banner["title"]; ?></h1>
        </div>				
    </div>

    <div class="container <?= ($currentPage == 'apoio.php') ? '' : 'border-bt';   ?>">
        <div class="begin-text1">
            <div class="bigparagraph bold" >
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
        <div class="begin-text1" id="focus">
            <div class="bigparagraph bold" >
                <p style="text-align: left;"><?= $content[172]["text"]; ?></p>
            </div>
        </div>
        <div class="begin-text1 pad0">
            <div class="div-btn-apoio">
                <div class="btns-apoio  padtp">
                    <a href="donativos.php#focus">
                        <div class="background-brown">
                            <?= $content[173]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="consignacao.php#focus">
                        <div class="background-brown">
                            <?= $content[188]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="heranca.php#focus">
                        <div class="background-brown">
                            <?= $content[190]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="pgto-tribunal.php#focus">
                        <div class="background-brown">
                            <?= $content[193]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="eventos-solidarios.php#focus">
                        <div class="background-brown">
                            <?= $content[195]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="voluntariado.php">
                        <div class="background-brown">
                            <?= $content[197]["text"]; ?>
                        </div>
                    </a>
                </div>
                <div class="btns-apoio  padtp">
                    <a href="boutique-bu-gosta.php">
                        <div class="background-brown">
                            <?= $content[198]["text"]; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>