<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'cc' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 

<section id="conduct" class="top">
	<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
		<div class="pellicle pellicle-main"></div>
		<div class="main-title">
			<h1><?= $banner["title"]; ?></h1>
		</div>
	</div>

	<div class="intro">
		<div class="flex2 doc-flex">
			<div class="flex2-div">
				<h2><?= $docs[0]["title"]; ?></h2>
				<div class="btns smaller-btns">
					<a href="<?= $docs[0]["folder"]; ?>" target="_blank">
						<div class="flex name-icon background-blue">
							<div class="name">
								CONSULTAR
							</div>
							<div class="icon">
								<img src="images/baixo-castanho.png" alt="">
							</div>
						</div>
					</a>
				</div>
				<div class="doc-flex-p">
				</div>
			</div>

			<div class="flex2-div">
				<h2><?= $docs[1]["title"]; ?></h2>
				<div class="btns smaller-btns">
					<a href="<?= $docs[1]["folder"]; ?>" target="_blank">
						<div class="flex name-icon background-blue">
							<div class="name">
								CONSULTAR
							</div>
							<div class="icon">
								<img src="images/baixo-castanho.png" alt="">
							</div>
						</div>
					</a>
				</div>
				<div class="doc-flex-p">
				</div>
			</div>
		</div>
	</div>

	<div class="end container-extra greyparagraph">
		<p><?= $content[53]["text"]; ?></p>
		<div class="btns">
			<a href="<?= $content[54]["text"]; ?>" target="_blank">
				<img src="<?= $ccimgs["folder"]; ?>" alt="Livro de Reclamações" >
			</a>
		</div>
	</div>
</section>

<?php include 'includes/footer.php'; ?>