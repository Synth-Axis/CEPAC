<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'cs' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top clinicalServices">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">		
					<?php foreach($csimages as $img) : ?>	        
						<div class="box">
							<div>
								<img src="<?= $img["folder"]; ?>" alt="<?= $img["src"]; ?>">	
							</div>
						</div>
					<?php endforeach ?>	           			           
		        </div>
			</div>

			<div class="container-right">
				<div class="mediumtitle middleparagraph">
					<h2><?= $content[99]["text"]; ?></h2>
					<div class="row-extra">
						<p><?= $content[100]["text"]; ?></p>
						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[101]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[102]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[103]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[104]["text"]; ?></p>
								</div>
							</div>
						</div>
						<br>
						<p><?= $content[105]["text"]; ?></p>
						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[106]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[107]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[108]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[109]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[110]["text"]; ?></p>
								</div>
							</div>
						</div>
					</div>		
				</div>	
			</div>
		</div>

		<div class="background-end background-brown btns medium-btns flex center">
			<a href="contactos.php">
        		<div class="flex name-icon background-blue">
        			<div class="name">
						<?= $content[111]["text"]; ?>
        			</div>
        			<div class="icon">
        				<img src="images/baixo-castanho.png" alt="">
        			</div>
        		</div>          				    					
        	</a>
		</div>
	</section>  	
	
<?php include 'includes/footer.php';?>		