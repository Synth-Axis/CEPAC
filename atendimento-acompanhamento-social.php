<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'aas' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top socialSupport">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">		
					<?php foreach($aasimages as $img) : ?>	      	 
						<div class="box">
							<div>
								<img src="<?= $img["folder"]; ?>" alt="<?= $img["src"]; ?>">
							</div>
						</div>	
					<?php endforeach; ?>
			        <div class="box">
			            <div>
			                <img src="images/fazemos/atendimento-acompanhamento-social/Rotativa_2.jpg" alt="">
			            </div>
			        </div>	
			        <div class="box">
			            <div>
			                <img src="images/fazemos/atendimento-acompanhamento-social/Rotativa_3.jpg" alt="">
			            </div>
			        </div>	    			           
		        </div>
			</div>

			<div class="container-right">
				<div class="mediumtitle middleparagraph">
					<h2><?= $content[59]["text"]; ?></h2>
					<div class="row">
						<p><?= $content[60]["text"]; ?></p>
					</div>	
				</div>	
				<div class="block mediumtitle">
					<div class="topics">
						<div class="border-brown border-brown-left">
							<p><?= $content[61]["text"]; ?></p>
						</div>
						<div class="border-brown border-brown-left">
							<p><?= $content[62]["text"]; ?></p>
						</div>
						<div class="border-brown border-brown-left">
							<p><?= $content[63]["text"]; ?></p>
						</div>
						<div class="border-brown border-brown-left">
							<p><?= $content[64]["text"]; ?></p>
						</div>
					</div>
				</div>
				<div class="middleparagraph">
					<p><?= $content[65]["text"]; ?></p>
				</div>
				<div class="block topics smallparagraph">
					<div class="border-blue flex nowrap flex-bullet">
						<div class="bullet">
							<img src="images/fazemos/icon-a.png" alt="">
						</div>
						<div>
							<p><?= $content[66]["text"]; ?></p>
						</div>	
					</div>
					<div class="border-blue flex nowrap flex-bullet">
						<div class="bullet">
							<img src="images/fazemos/icon-b.png" alt="">
						</div>
						<div>
							<p><?= $content[67]["text"]; ?></p>
						</div>	
					</div>
					<div class="border-blue flex nowrap flex-bullet">
						<div class="bullet">
							<img src="images/fazemos/icon-c.png" alt="">
						</div>
						<div>
							<p><?= $content[68]["text"]; ?></p>
						</div>	
					</div>
				</div>
			</div>
		</div>	

		<div class="background-end background-brown flex center">
			<div class="btns medium-btns">
				<a href="contactos.php">
	        		<div class="flex name-icon background-blue">
	        			<div class="name">
							<?= $content[69]["text"]; ?>
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