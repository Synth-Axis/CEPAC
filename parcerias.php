<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'part' ");
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
						</a>
					</li>
					<li>
						<a href="parcerias.php">
							<div class="link background-brown"><?= $content[201]["text"]; ?></div>
							<div class="line background-brown"></div>
						</a>
					</li>
				</ul>
			</nav>

			<div class="mediumparagraph">
				<p><?= $content[58]["text"]; ?></p>
				<div class="btns medium-btns">
				<a href="contactos.php">
	        		<div class="flex name-icon background-blue">
	        			<div class="name">
							<?= $content[202]["text"]; ?>
	        			</div>
	        			<div class="icon">
	        				<img src="images/baixo-castanho.png" alt="">
	        			</div>
	        		</div>          				    					
	        	</a>
	        </div>	
			</div>

			<div class="logos flex">
				<?php foreach($parnershipsimages as $pt) : ?>
					<div>
						<img src="<?= $pt["folder"]; ?>" alt="">
					</div>	
				<?php endforeach; ?>	
			</div>

			<div class="faqs">
				<?php foreach($ptcontent as $pt) : ?>
					<div>
						<div class="faq-question border-brown border-brown-left flex">
							<div class="faq-name">
								<h2><?= $pt["title"]; ?></h2>
							</div>	
							<div>
								<div class="faq-open">
									<img src="images/direita-azul.png" alt="">
								</div>
								<div class="faq-closed">
									<img src="images/baixo-azul.png" alt="">
								</div>	
							</div>
						</div>
						<div class="faq-answer middleparagraph">
							<?= $pt["text"]; ?>
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