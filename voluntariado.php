<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'sv' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top volunteering">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>
 
		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">	
					<?php foreach($svimages as $img ) : ?>		      	 
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
					<h2><?= $content[127]["text"]; ?></h2>
					<div class="row">
						<p><?= $content[128]["text"]; ?></p>

						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[129]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[130]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[131]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[132]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[133]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[134]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[135]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[136]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[137]["text"]; ?></p>
								</div>
							</div>
						</div>

						<div class="middleparagraph">
							<p><?= $content[138]["text"]; ?></p>
						</div>

						<div class="block topics smallparagraph">
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-a.png" alt="">
								</div>
								<div>
									<p><?= $content[139]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-b.png" alt="">
								</div>
								<div>
									<p><?= $content[140]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-c.png" alt="">
								</div>
								<div>
									<p><?= $content[141]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-d.png" alt="">
								</div>
								<div>
									<p><?= $content[142]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-e.png" alt="">
								</div>
								<div>
									<p><?= $content[143]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-f.png" alt="">
								</div>
								<div>
									<p><?= $content[144]["text"]; ?></p>
								</div>	
							</div>
							<div class="border-blue flex nowrap flex-bullet">
								<div class="bullet">
									<img src="images/fazemos/icon-g.png" alt="">
								</div>
								<div>
									<p><?= $content[145]["text"]; ?></p>
								</div>	
							</div>
						</div>

						<div class="middleparagraph">
							<p><?= $content[146]["text"]; ?> <a href="mailto:<?= $content[147]["text"]; ?>"><?= $content[147]["text"]; ?></a>.</p>
						</div>
					</div>	
				</div>					
			</div>			
		</div>	

		<div class="background-end background-brown flex center">
			<div class="btns medium-btns">
				<a href="<?= $content[149]["text"]; ?>" target="_blank">
	        		<div class="flex name-icon background-blue">
	        			<div class="name">
						<?= $content[148]["text"]; ?>
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