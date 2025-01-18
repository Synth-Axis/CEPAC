<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'cm' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>
 
	<section id="activities" class="top drugSupport">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">		
					<?php foreach($cmimages as $img) : ?>	        
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
					<div class="row">
						<p><?= $content[150]["text"]; ?></p> 
						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[151]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[152]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[153]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[154]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[155]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[156]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[157]["text"]; ?></p>
								</div>
							</div>
						</div>
						<br> 
						<p><?= $content[158]["text"]; ?> <a href="mailto:<?= $content[159]["text"]; ?>"><?= $content[159]["text"]; ?></a></p>
						<br>
						<h2><?= $content[160]["text"]; ?></h2>
						<div class="btns smaller-btns"> 
							<a href="<?= $content[162]["text"]; ?>" target="_blank">
								<div class="flex name-icon background-blue">
									<div class="name">
										<?= $content[161]["text"]; ?>
									</div>
									<div class="icon">
										<img src="images/baixo-castanho.png" alt="">
									</div>
								</div>          				    					
							</a>
						</div>
					</div>	
				</div>				
			</div>
		</div>
		<div class="background-end background-brown">
			<div class="btns bigger-btns flex center">
				<a href="apoio.php">
					<div class="flex name-icon background-blue">
						<div class="name">
							<?= $content[163]["text"]; ?>
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