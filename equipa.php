<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>
<?php
// VIEW BANNER
	$query = $db->prepare("SELECT * FROM banners WHERE tag = 'team' ");
	$query->execute();
	$banner = $query->fetch( PDO::FETCH_ASSOC );
?>	
 
	<section id="team" class="top">
		<div class="banner banner-main"  style="background-image: url('<?= $banner["folder"] ?>')">
			<div class="pellicle pellicle-main"></div>
			<div class="main-title">
				<h1><?= $banner["title"]; ?></h1>
			</div>				
		</div>	  

		<div class="container">
			<div class="begin-text">
				<div class="bigparagraph bold">
					<p><?= $content[48]["text"]; ?></p>
				</div>
				<div class="paragraph light">
					<p><?= $content[49]["text"]; ?></p> 
				</div>	
			</div>		 
		</div>	
		<div class="people">

			<div class="content supertitle">
				<h2><?= $teamroles[0]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team1 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 															
								</div>
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>					
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[1]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team2 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>					
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
			<div class="content supertitle">
				<h2><?= $teamroles[11]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team12 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>					
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[2]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team3 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>				
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[3]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team4 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>				
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[4]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team5 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>				
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[5]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team6 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>		
												
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[6]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team7 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>		
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>		
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[7]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team8 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>			
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[8]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team9 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>						
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[9]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team10 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>			
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>
			<div class="content supertitle">
				<h2><?= $teamroles[10]["name"]; ?></h2>
				<div class="flex flex-column">
					<?php foreach($team11 as $team) : ?>
						<div class="boxes">
							<div class="equipa-main">
								<div class="equipa-img">
									<?php if(!empty($team["folder"] )) : ?>
										<img src="<?= $team["folder"]; ?>" alt="<?= $team["name"]; ?>" >
									<?php endif; ?> 																				
								</div>	
								<div class="equipa-box">
									<h3><?= $team["name"]; ?></h3>
									<?php if(!empty($team["role"] )) : ?>
										<p><?= !empty($team["role"]) ? $team["role"] : ''; ?></p>
									<?php endif; ?> 	
								</div>					
							</div>				
						</div>											
					<?php endforeach; ?> 																								
				</div>
			</div>

		</div>	

		<div class="volunteering">
			<div class="lead supertitle greyparagraph">
				<h2><?= $content[50]["text"]; ?></h2>
				<p><?= $content[51]["text"]; ?></p>
			</div>				
		</div>

		<div class="end banner flex center">
			<div class="btns medium-btns">
				<a href="voluntariado.php">
	        		<div class="flex name-icon background-blue">
	        			<div class="name">
							<?= $content[52]["text"]; ?>
	        			</div>
	        			<div class="icon">
	        				<img src="images/baixo-castanho.png" alt="CEPAC">
	        			</div>
	        		</div>          				    					
	        	</a>
	        </div>	
		</div>
	</section>  	
	
<?php include 'includes/footer.php';?>		