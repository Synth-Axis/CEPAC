<?php include 'includes/head.php'; ?>
<div id="grey">
    <?php include 'includes/header.php'; ?>
</div>

<section id="about" class="top">
    <?php include 'includes/apoio.php'; ?>  

    <div class="container">
        <div class="begin-text">
            <div class="bigparagraph bold">
                <p><?= $content[190]["text"]; ?></p>
            </div>
            <div class=" texting paragraph-consig">
                <p style="color: #333333 !important;"><?= $content[191]["text"]; ?>
                    <a href="contactos.php#contacts"><span class="color-blue str-b under"><?= $content[192]["text"]; ?></span></a>
                </p>
            </div>
        </div>

</section>

<?php include 'includes/footer.php'; ?>