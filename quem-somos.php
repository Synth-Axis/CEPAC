<?php include 'includes/head.php';?>
<?php include 'includes/header.php';

// VIEW IMG
$query = $db->prepare("SELECT * FROM images WHERE img_id = 10 ");
$query->execute();
$banner_img = $query->fetch( PDO::FETCH_ASSOC );

$banner = $banner_img["folder"];

?>	
<style>
	.banner-main {
    	background-image: url(<?= $banner; ?>) !important;
    	height: 38rem !important;
	}
</style>
 
	<section id="about" class="top">
		<div class="banner banner-main">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $content[36]["text"]; ?></h1>
			</div>				 
		</div>	

		<div class="container">
			<div class="begin-text">
				<div class="bigparagraph bold">
					<p class="blue"><?= $content[37]["text"]; ?></p>
				</div>
				<div class="paragraph light">
					<p><?= $content[38]["text"]; ?></p>
				</div>	
			</div>		
		</div>

		<div class="mission flex container smalltitle paragraph">
			<div class="left">
				<img src="<?= $aboutimages[1]["folder"]; ?>" alt="CEPAC">
				<div class="texting">
					<h2><?= $content[39]["text"]; ?></h2>
					<p><?= $content[40]["text"]; ?></p>
					<h2><?= $content[41]["text"]; ?></h2>
					<p><?= $content[42]["text"]; ?></p>
				</div>	
			</div>
			<div class="right">				
				<div class="texting">
					<h2><?= $content[43]["text"]; ?></h2>
					<p><?= $content[44]["text"]; ?></p>
				</div>	
				<img src="<?= $aboutimages[2]["folder"]; ?>" alt="CEPAC">
			</div>
		</div>

		<div class="constitution hipertitle slider-container slider-container-right">
			<h2><?= $content[45]["text"]; ?></h2>
	        <div class="slider-four slider-border-right">
				<?php foreach($aboutslider as $img) : ?>
					<div class="box">
						<div>
							<a href="<?= $img["link"]; ?>">
								<img src="<?= $img["folder"]; ?>" alt="CEPAC"> 
							</a>	
							<h3><?= $img["text"]; ?></h3>
						</div>
					</div>
				<?php endforeach; ?>
            </div>
        </div>

        <div class="end">
        	<p><?= $content[46]["text"]; ?></p>
        	<div class="btns flex">
        		<div>
        			<a href="redes.php">
        				<div class="flex name-icon background-blue">
        					<div class="name">
								<?= $content[47]["text"]; ?>
        					</div>
        					<div class="icon">
        						<img src="images/baixo-castanho.png" alt="">
        					</div>
        				</div>          				    					
        			</a>
        		</div>
        	</div>
        </div>
	</section>  	
	
<?php include 'includes/footer.php';?>		