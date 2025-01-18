<?php include 'includes/head.php'; ?>
<div id="grey">
    <?php include 'includes/header.php'; ?>
</div>
<?php
if (isset($_GET['showAbout']) && $_GET['showAbout'] === 'true') {
?>
    <section id="about" class="top">
        <?php include 'includes/apoio.php'; ?>

        <div class="container">
            <div class="begin-text">
                <div class="bigparagraph bold">
                    <p><?= $content[195]["text"]; ?></p>
                </div>
                <div class="texting paragraph-consig">
                    <p style="color: #333333 !important;"><?= $content[196]["text"]; ?></p>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>

<?php include 'includes/footer.php'; ?>