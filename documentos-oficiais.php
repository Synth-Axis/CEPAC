<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>	
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'docof' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="statutes" class="top">
		<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>

		<div class="intro">
			<div class="flex doc-flex">
				<div>
					<h2><?= $docsof[0]["title"]; ?></h2>
					<div class="btns smaller-btns"> 
						<a href="<?= $docsof[0]["folder"]; ?>" target="_blank">
			        		<div class="flex name-icon background-blue">
			        			<div class="name">
			        				CONSULTAR
			        			</div>
			        			<div class="icon">
			        				<img src="images/baixo-castanho.png" alt="">
			        			</div>
			        		</div>          				    					
			        	</a>
			        </div>
			    </div>  
			    
			    <div>
					<h2><?= $docsof[1]["title"]; ?></h2>
					<div class="btns smaller-btns"> 
						<a href="<?= $docsof[1]["folder"]; ?>" target="_blank">
			        		<div class="flex name-icon background-blue">
			        			<div class="name">
			        				CONSULTAR
			        			</div>
			        			<div class="icon">
			        				<img src="images/baixo-castanho.png" alt="">
			        			</div>
			        		</div>          				    					
			        	</a>
			        </div>
			    </div>  

			    <div>
					<h2><?= $docsof[2]["title"]; ?></h2>
					<div class="btns smaller-btns"> 
						<a href="<?= $docsof[2]["folder"]; ?>" target="_blank">
			        		<div class="flex name-icon background-blue">
			        			<div class="name">
			        				CONSULTAR
			        			</div> 
			        			<div class="icon">
			        				<img src="images/baixo-castanho.png" alt="">
			        			</div>
			        		</div>          				    					
			        	</a>
			        </div>
			    </div> 
			</div>       

	        <div class="history paragraph supertitle">
	        	<h2><?= $content[55]["text"]; ?></h2>
	        	<p><?= $content[56]["text"]; ?></p>
	        </div>

	        <div class="images flex">
				<div>
					<img src="<?= $docsimgs[0]["folder"]; ?>" alt="">
				</div>
				<div>
					<img src="<?= $docsimgs[1]["folder"]; ?>" alt="">
				</div>
				<div>
					<img src="<?= $docsimgs[2]["folder"]; ?>" alt="">
				</div>
			</div>
		</div>				
	</section>  	
	
<?php include 'includes/footer.php';?>		