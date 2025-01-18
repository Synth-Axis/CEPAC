<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'ipf' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="activities" class="top professionalInsertion">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="wrapper flex">
			<div class="slider-container">
			    <div class="slider-activities1 slider-border-left">		
					<?php foreach($ipfimages as $img) : ?>	      	 
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
					<h2><?= $content[70]["text"]; ?></h2>
					<div class="row">
						<p><?= $content[71]["text"]; ?></p>

						<div class="block mediumtitle">
							<div class="topics">
								<div class="border-brown border-brown-left">
									<p><?= $content[72]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[73]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[74]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[75]["text"]; ?></p>
								</div>
								<div class="border-brown border-brown-left">
									<p><?= $content[76]["text"]; ?></p>
								</div>
							</div>
						</div>
					</div>	
				</div>	

				<div class="faqs">
					<div>
						<div class="faq-question border-blue border-blue-left flex">
							<div class="faq-name">
								<h2><?= $content[77]["text"]; ?></h2>
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
							<p><?= $content[78]["text"]; ?></p>
							<div class="block block-blue topics smallparagraph">
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[79]["text"]; ?></span>	
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[80]["text"]; ?></span>	
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[81]["text"]; ?></span>	
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[82]["text"]; ?></span>
								</div>
								<br>	
								<div>					
									<ul class="bullet-list">
										<li>Contacte-nos: <a href="mailto:<?= $content[83]["text"]; ?>"><?= $content[83]["text"]; ?></a></li>
									</ul>	
								</div>				
							</div>
						</div>
					</div>
					<div>
						<div class="faq-question border-blue border-blue-left flex">
							<div class="faq-name">
								<h2><?= $content[84]["text"]; ?></h2>
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
							<p><?= $content[85]["text"]; ?></p>
							<div class="block block-blue topics smallparagraph">
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[86]["text"]; ?></span>	
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[87]["text"]; ?></span>
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[88]["text"]; ?></span>	
								</div>
								<div class="border-blue">					
									<span class="block-blue-span"><?= $content[89]["text"]; ?></span>	
								</div>
								<br>	
								<div>					
									<ul class="bullet-list">
										<li>Contacte-nos: <a href="mailto:<?= $content[90]["text"]; ?>"><?= $content[90]["text"]; ?></a></li>
									</ul>	
								</div>				
							</div>
						</div>
					</div>
				</div>

				<div class="minititle btns-padding">
					<h3><?= $content[91]["text"]; ?></h3>
				</div>

				<div class="block block-blue topics smallparagraph">
					<div class="border-blue">					
						<p><?= $content[92]["text"]; ?></p>	
					</div>
					<div class="border-blue">					
						<p><?= $content[93]["text"]; ?></p>	
					</div>
					<div class="border-blue">					
						<p><?= $content[94]["text"]; ?></p>	
					</div>
					<div class="border-blue">					
						<p><?= $content[95]["text"]; ?></p>	
					</div>	
					<div class="border-blue">					
						<p><?= $content[96]["text"]; ?></p>	
					</div>	
					<div class="border-blue">					
						<p><?= $content[97]["text"]; ?></p>	
					</div>				
				</div>	
			</div>
		</div>	

		<div class="background-end background-brown">
			<div class="btns bigger-btns flex center">
				<a href="contactos.php">
	        		<div class="flex name-icon background-blue">
	        			<div class="name">
							<?= $content[98]["text"]; ?>
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