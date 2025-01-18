<?php include 'includes/head.php'; ?>
<div id="grey">
	<?php include 'includes/header.php'; ?>
</div>

<section id="news" class="top-extra">
	<div class="container bigtitle">
		<div class="flex-between">
			<h1>NOTÍCIAS</h1>

			<form id="news-filter" method="GET" action="">
				<div class="news-filter">
					<select name="year" id="year">
						<option value="">ESCOLHA O ANO</option>
						<?php
						$currentYear = date("Y");
						for ($i = $currentYear; $i >= 2000; $i--) {
							echo "<option value='$i'" . (isset($_GET['year']) && $_GET['year'] == $i ? " selected" : "") . ">$i</option>";
						}
						?>
					</select>


					<select name="month" id="month">
						<option value="">ESCOLHA O MÊS</option>
						<?php
						$months = [
							1 => 'Janeiro',
							'Fevereiro',
							'Março',
							'Abril',
							'Maio',
							'Junho',
							'Julho',
							'Agosto',
							'Setembro',
							'Outubro',
							'Novembro',
							'Dezembro'
						];

						for ($m = 1; $m <= 12; $m++) {
							$monthName = $months[$m];
							echo "<option value='$m'" . (isset($_GET['month']) && $_GET['month'] == $m ? " selected" : "") . ">$monthName</option>";
						}
						?>
					</select>

					<input type="text" name="search" id="search" placeholder="PROCURAR NO TÍTULO" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

					<button class="filter-btn" type="submit">FILTRAR</button>
				</div>
			</form>
		</div>
	</div>

	<!-- News Blocks -->
	<div class="blocks">
		<div class="columns flex smalltitle smallparagraph">
			<?php foreach ($allnews as $news) : ?>
				<div>
					<div>
						<a href="noticia.php?n=<?= $news["news_id"]; ?>">
							<img src="<?= $news["banner_folder"]; ?>" alt="<?= $news["title"]; ?>">
						</a>
						<h3><?= $news["title"]; ?></h3>
						<p><?= $news["tdate"]; ?></p>
						<br>
						<p><?= $news["shorttext"]; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>


<?php include 'includes/footer.php'; ?>