<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'net' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="partners" class="top">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>	

		<div class="topics container">
			<nav>
				<ul>
					<li>
						<a href="redes.php">
							<div class="link background-blue"><?= $content[200]["text"]; ?></div>
							<div class="line background-blue"></div>
						</a>
					</li>
					<li>
						<a href="parcerias.php">
							<div class="link background-brown"><?= $content[201]["text"]; ?></div>
						</a>
					</li>
				</ul>
			</nav>

			<div class="mediumparagraph">
				<p><?= $content[57]["text"]; ?></p>
			</div>

			<div class="logos flex">
				<?php foreach($networksimages as $img) : ?>
					<div>
						<img src="<?= $img["folder"]; ?>" alt="">
					</div>
				<?php endforeach; ?>
			</div>

			<div class="faqs">
				<?php foreach($ntcontent as $nt) : ?>
					<div>
						<div class="faq-question border-blue border-blue-left flex">
							<div class="faq-name">
								<h2><?= $nt["title"]; ?></h2>
							</div>	
							<div>
								<div class="faq-open">
									<img src="images/direita-castanho.png" alt="">
								</div>
								<div class="faq-closed">
									<img src="images/baixo-castanho.png" alt="">
								</div>	
							</div>
						</div>
						<div class="faq-answer middleparagraph">
							<?= $nt["text"]; ?>
						</div>
					</div>
				<?php endforeach; ?>
				
			</div>	
		</div>
	</section>  	
	<style>
		#partners .faqs img {
			width: inherit !important;
		}
	</style>
	
<?php include 'includes/footer.php';?>		