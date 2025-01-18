<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
// VIEW BANNER
$query = $db->prepare("SELECT * FROM banners WHERE tag = 'pr' ");
$query->execute();
$banner = $query->fetch(PDO::FETCH_ASSOC);
?>


<section id="reports" class="top">
	<div class="banner banner-main" style="background-image: url('<?= $banner["folder"] ?>')">
		<div class="pellicle pellicle-main"></div>
		<div class="main-title">
			<h1><?= $banner["title"]; ?></h1>
		</div>
	</div>

	<div id="page" class="wrap flex nowrap">
		<div class="menu">
			<nav>
				<ul class="years-list">
					<?php foreach ($pr_year as $year) : ?>
						<li>
							<a class="list" data-year="<?= $year["year"]; ?>"><?= $year["year"]; ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>

		<div class="documents">
			<div class="width">
				<div class="mediumtitle">
					<h2>Planos e Relatórios</h2>
				</div>
				<div
					<?php foreach ($pr_year as $year) : ?>
					<div class="docs links" data-box="<?= $year["year"]; ?>">
					<?php
						$theyear = $year["year"];

						// VIEW PR DOCS
						$query = $db->prepare("SELECT * FROM plans_reports WHERE year = $theyear ORDER BY prorder ASC");
						$query->execute();
						$pr_docs = $query->fetchAll(PDO::FETCH_ASSOC);


						foreach ($pr_docs as $docs) {
							echo '<div>
                                        <a class="document-card" href="' . $docs["folder"] . '" target="_blank">
											<img class="documents-thumbs" src="' . $docs["thumbnail"] . '" >
											<p>' . $docs["title"] . '<p>
										</a>
                                    </div>';
						}
					?>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	</div>

	<div class="separator background-brown"></div>
</section>


<?php include 'includes/footer.php'; ?>