<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'ms' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top foodSupport">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">
					<?php foreach($msimages as $img) : ?>
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
					<h2><?= $content[123]["text"]; ?></h2>
					<div class="row">
						<p><?= $content[124]["text"]; ?></p>
					</div>	
				</div>											
			</div>
		</div>

		<div class="flex flex-row background-brown div-button">
			<div class="background-end background-brown btns medium-btns flex center">
				<a href="contactos.php">
					<div class="flex name-icon background-blue">
						<div class="name">
							<?= $content[125]["text"]; ?>
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
							<?= $content[126]["text"]; ?>
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