<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'bbu' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top donatedSupport">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">		
					<?php foreach($bbuimages as $img) : ?>	        
						<div class="box">
							<div>
								<img src="<?= $img["folder"]; ?>" alt="<?= $img["src"]; ?>">
							</div>
						</div>
					<?php endforeach; ?>	           			           
		        </div>
			</div>

			<div class="container-right">
				<div class="mediumtitle middleparagraph">
					<h2><?= $content[112]["text"]; ?></h2>
					<div class="row">
						<p><?= $content[113]["text"]; ?></p>
						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[114]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[115]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[116]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[117]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[118]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[119]["text"]; ?></p>
								</div>
							</div>
						</div>
					</div>	
				</div>				
			</div>
		</div>

		<div class="flex flex-row background-brown div-button">
			<div class="background-end background-brown btns medium-btns flex center">
				<a href="contactos.php">
					<div class="flex name-icon background-blue">
						<div class="name">
							<?= $content[120]["text"]; ?>
						</div>
						<div class="icon">
							<img src="images/baixo-castanho.png" alt="">
						</div>
					</div>          				    					
				</a>
			</div>
			<div class="background-end background-brown btns medium-btns flex center">
				<a href="mercearia-sabura.php">
					<div class="flex name-icon background-blue">
						<div class="name">
							<?= $content[121]["text"]; ?>
						</div>
						<div class="icon">
							<img src="images/baixo-castanho.png" alt="">
						</div>
					</div>          				    					
				</a>
			</div>
			<div class="background-end background-brown btns medium-btns flex center">
				<a href="apoio.php">
					<div class="flex name-icon background-blue">
						<div class="name">
							<?= $content[122]["text"]; ?>
						</div>
						<div class="icon">
							<img src="images/baixo-castanho.png" alt="">
						</div>
					</div>          				    					
				</a>
			</div>
		</div>
	</section>  	
	
<?php include 'includes/footer.php';?>		