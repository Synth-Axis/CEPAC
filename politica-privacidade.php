<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'pp' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	

<section id="activities" class="top drugSupport">
    <div class="banner banner-main"  style="background-image: url('<?= $banner["folder"] ?>')">
        <div class="pellicle pellicle-main"></div>
        <div class="main-title">
            <h1><?= $banner["title"]; ?></h1>
        </div>				
    </div>	 

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[203]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[204]["text"]; ?></p>
                </div>
                <div>
                    <ul class="list-policy">
                        <li class="item-policy"><?= $content[205]["text"]; ?></li>
                        <li class="item-policy"><?= $content[206]["text"]; ?></li>
                        <li class="item-policy"><?= $content[207]["text"]; ?></li>
                        <li class="item-policy"><?= $content[208]["text"]; ?></li>
                    </ul>
                </div>
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[209]["text"]; ?></p>
                </div>

                <div>
                    <ul class="list-policy">
                        <li class="item-policy"><?= $content[210]["text"]; ?></li>
                    </ul>
                </div>
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[211]["text"]; ?></p>
                </div>
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[212]["text"]; ?></p>
                </div>
                <div>
                    <ul class="list-policy">
                        <li class="item-policy"><?= $content[213]["text"]; ?></li>
                        <li class="item-policy"><?= $content[214]["text"]; ?></li>
                        <li class="item-policy"><?= $content[215]["text"]; ?></li>
                        <li class="item-policy"><?= $content[216]["text"]; ?></li>
                        <li class="item-policy"><?= $content[217]["text"]; ?></li>
                        <li class="item-policy"><?= $content[218]["text"]; ?></li>
                        <li class="item-policy"><?= $content[219]["text"]; ?></li>
                        <li class="item-policy"><?= $content[220]["text"]; ?></li>
                        <li class="item-policy"><?= $content[221]["text"]; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[222]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[223]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[224]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[225]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[226]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[227]["text"]; ?><br><br>
                    </p>
                </div>
                <div>
                    <ul class="list-policy">
                        <li class="item-policy"><?= $content[228]["text"]; ?></li>
                        <li class="item-policy"><?= $content[229]["text"]; ?></li>
                        <li class="item-policy"><?= $content[230]["text"]; ?></li>
                        <li class="item-policy"><?= $content[231]["text"]; ?></li>
                        <li class="item-policy"><?= $content[232]["text"]; ?></li>
                        <li class="item-policy"><?= $content[233]["text"]; ?></li>
                        <li class="item-policy"><?= $content[234]["text"]; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[235]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[236]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[237]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[238]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container border-bt">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[239]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[240]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="begin-text1">
            <div class="bigparagraph bold">
                <p><?= $content[241]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-apoio">
                <div class="infos-apoio">
                    <p style="margin-left: 0.5rem;"><?= $content[242]["text"]; ?></p>
                </div>
            </div>
        </div>
    </div>



</section>

<?php include 'includes/footer.php'; ?>