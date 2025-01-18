<?php

$news_id = isset($_GET["n"]) ? $_GET["n"] : '';
$cookies = isset($_GET["cookies"]) ? $_GET["cookies"] : '';
print_r($cookies);

if (!empty($cookies)) {
	header("Location: inicio.php");
}

?>
<?php include 'includes/head.php'; ?>
<style>
	.title-strong {
		font-weight: bold;
		color: #d1b05f;
		font-size: 1.3rem;
	}

	li {
		font-size: 1.3rem;
	}

	b {
		font-weight: bold;
	}
</style>
<div id="grey">
	<?php include 'includes/header.php';




	// VIEW TEAM
	$query = $db->prepare("SELECT * FROM news WHERE news_id = :news_id");

	$query->bindParam(":news_id",  $param_news_id, PDO::PARAM_INT);

	$param_news_id = $news_id;

	$query->execute();

	$news = $query->fetch(PDO::FETCH_ASSOC);

	if (!empty($cookies)) {
		header("Location: home.php");
	}


	?>
</div>

<section id="article" class="top-extra">
	<div class="container">
		<div class="bigtitle" style="display: flex;flex-direction: column; justify-content: center; align-items: center;">
			<h1><?= $news["title"]; ?></h1>
			<img style="width: 50%;" src="<?= $news["folder"]; ?>" alt="">
		</div>

		<div class="middleparagraph">
			<p style="font-size: 2rem;">
			<p class="news-date"><?= $news["tdate"]; ?></p>
			<?= $news["text"]; ?>
			</p>
		</div>
	</div>
</section>
<style>
	/* #article .middleparagraph img {
			width: inherit !important;
		} */
	/* 
		@media only screen and (max-width: 1440px) {
			#article .middleparagraph img  {
				width: 28vw !important;
			}
		} */
</style>

<?php include 'includes/footer.php'; ?>