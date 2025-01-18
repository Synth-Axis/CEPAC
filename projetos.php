<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
// VIEW BANNER
$query = $db->prepare("SELECT * FROM banners WHERE tag = 'pj' ");
$query->execute();
$banner = $query->fetch(PDO::FETCH_ASSOC);
?>

<section id="activities" class="top projects">

	<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
		<div class="pellicle pellicle-main"></div>
		<div class="main-title">
			<h1><?= $banner["title"]; ?></h1>
		</div>
	</div>
	<div class="projetos">
		<h2>Em Curso</h2>
	</div>
	<div class="slider-wrapper">
		<div class="slider-container">
			<div class="slider-activities1 slider-border-left">

				<?php foreach ($pjimages as $img) : ?>
					<?php if ($img['tag'] === 'pj') : ?>
						<div class="projetos-box">
							<div class="slider-box">
								<div>
									<div>
										<img src="<?= $img["folder"]; ?>" alt="<?= $img["src"]; ?>">
									</div>
									<?php

									foreach ($projects as $project) :
										if ($project['porder'] == $img['iorder']) :
									?>
											<a href="projeto.php?n=<?= $project["project_id"]; ?>">
												<h2><?= $project["title"]; ?></h2>
											</a>
									<?php
											break;
										endif;
									endforeach;
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="projetos">
		<h2>Finalizados</h2>
	</div>



	<div class="news banner title smalltitle smallparagraph slider-container slider-container-right finalizados">
		<div class="slider-three slider-border-right">
			<?php foreach ($pjimages as $img) : ?>
				<?php if ($img['tag'] === 'pj') : ?>
					<a href="projeto.php?n=<?= $project["project_id"]; ?>">
						<div class="projetos-box">
							<div class="slider-box">
								<div class="finalizados-box">
									<div>
										<img src="<?= $img["folder"]; ?>" alt="<?= $img["src"]; ?>">
									</div>
									<?php

									foreach ($projects as $project) :
										if ($project['porder'] == $img['iorder']) :
									?>

											<h2><?= $project["title"]; ?></h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

									<?php
											break;
										endif;
									endforeach;
									?>
								</div>
							</div>
						</div>
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>

</section>
<style>
	#activities .mediumtitle img {
		width: inherit !important;
	}
</style>

<?php include 'includes/footer.php'; ?>