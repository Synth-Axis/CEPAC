<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>


<section id="home" class="top">
	<div class="slider-banner">
		<?php foreach ($homeslider as $img) : ?>
			<div class="banner" style="background-image: url('<?= $img["folder"] ?>')">
				<div class="pellicle"></div>
				<div class="main-title">
					<h1><?= $content[0]["text"]; ?></h1>
					<p><?= $content[1]["text"]; ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="background-grey container">
		<div class="begin-text bigparagraph bold">
			<p class="blue"><?= $content[2]["text"]; ?></p>
		</div>
	</div>

	<div class="highlights container title smallparagraph">
		<h2>Em destaque</h2>
		<div class="slider-three">
			<?php foreach ($destaque as $n) : ?>
				<div class="box">
					<div>
						<a href="noticia.php?n=<?= $n["news_id"]; ?>">
							<img src="<?= $n["banner_folder"]; ?>" alt="<?= $n["title"]; ?>">
						</a>
						<h3><?= $n["title"]; ?></h3>
						<p><?= $n["shorttext"]; ?></p>
						<a href="noticia.php?n=<?= $n["news_id"]; ?>" class="link-read-more">
							<span class="read-more">LEIA MAIS</span>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="news banner title smalltitle smallparagraph slider-container slider-container-right">
		<h2>Notícias</h2>
		<div class="slider-three slider-border-right">
			<?php foreach ($tennews as $news) : ?>
				<div class="box">
					<div>
						<a href="noticia.php?n=<?= $news["news_id"]; ?>">
							<img src="<?= $news["banner_folder"]; ?>" alt="<?= $news["title"]; ?>">
						</a>
						<h4><?= $news["title"]; ?></h4>
						<p><?= $news["tdate"]; ?></p>
						<br>
						<p><?= $news["shorttext"]; ?></p>
						<br><br>
						<a href="noticia.php?n=<?= $news["news_id"]; ?>" class="link-read-more">
							<span class="read-more">LEIA MAIS</span>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- The Modal 
			<div id="myModal" class="modal">
			<div class="modal-content">
			<span class="close">&times;</span>
			<img src="images/irspopup.png" alt="Popup" class="img-modal"/>
			</div>

			</div>

			<script>
			// Get the modal
				var modal = document.getElementById("myModal");

			// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
					modal.style.display = "none";
				}

			// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			</script>-->
</section>


<?php include 'includes/footer.php'; ?>