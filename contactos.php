<?php include 'includes/head.php';?>	
<?php include 'includes/header.php';
include('includes/form-contactos.php'); 

?>	
 
<style>
.captchaimg{
	height: 55px;
}
.captchamsg {
	margin: 0.5rem 0 1.5rem 0;
}
</style>
	<section id="contacts" class="top">
		<div class="container flex background-brown">
			<div class="map">
				<iframe src="<?= $content[30]["text"]; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>	
			<div>
				<div class="block paragraph">
					<h1><?= $content[28]["text"]; ?></h1>
					<p><?= $content[29]["text"]; ?> (<a href="<?= $content[35]["text"]; ?>" target="blank">ver mapa</a>)</p>
					<p><?= $content[31]["text"]; ?><br><a href="mailto:<?= $content[32]["text"]; ?>"><?= $content[32]["text"]; ?></a></p>
				</div>	
				<div class="block paragraph">
					<h2><?= $content[33]["text"]; ?></h2>
					<p><?= $content[34]["text"]; ?></p>
				</div>
				<div>
					<h2>Fale connosco</h2>
					<form method="post" action="">
						<div>
							<input type="text" name="name" placeholder="NOME" aria-label="Nome" required value="<?= isset($_POST["name"]) ? $_POST["name"] : '' ?>">
						</div>	
						<div class="flex">
							<div>
								<input type="email" name="email" placeholder="EMAIL" aria-label="Email" required value="<?= isset($_POST["email"]) ? $_POST["email"] : '' ?>">
							</div>
							<div>	
								<input type="text" name="phone" placeholder="TELEFONE" aria-label="Telefone" required value="<?= isset($_POST["phone"]) ? $_POST["phone"] : '' ?>">
							</div>
						</div>				
						<div>	
							<textarea name="message" placeholder="MENSAGEM" aria-label="Mensagem" required><?= isset($_POST["message"]) ? $_POST["message"] : '' ?></textarea>
						</div>	
						<div class="flex">
							<div class="form-group col-6">
								<input type="text" class="form-control" name="captcha" id="captcha" required placeholder="CAPTCHA">
							</div>
							<div class="form-group col-6">
								<img src="captcha.php" alt="PHP Captcha" class="captchaimg">
							</div>
						</div>
						   <!-- Captcha error message -->
						<?php if(!empty($captchaError)) {?>
							<div class="flex">
								<div class="form-group col-12 text-center">
									<div class="alert text-center <?php echo $captchaError['status']; ?>">
										<p class="captchamsg"><?php echo $captchaError['message']; ?></p>
									</div>
								</div>
							</div>
						<?php }?>
						<div class="send">
							<button type="submit" name="send">Enviar</button>
						</div>
					</form>	
				</div>		
			</div>	
		</div>	
	</section>  	


	<section class="popup-form" style="<?php echo isset($_SESSION['form_success']) ? 'display: block' : ''; ?>">
		<div class="popup-form-content">	
			<div class="popup-form-close">
				<img src="images/fechar.png" alt="Ícone de fechar">
			</div>
			<div class="popup-form-text">
				<?php if(isset($_SESSION['form_success']) && $_SESSION['form_success'] === true) : ?>
				<p>Pedido enviado com sucesso. Obrigado.</p>	
				<?php elseif(isset($_SESSION['form_success']) && $_SESSION['form_success'] === false) : ?>
				<p>O pedido falhou! Por favor, tente novamente.</p>		
				<?php endif; ?>
			</div>			
		</div>	
	</section>
	

<?php include 'includes/footer.php';?>		


<?php 
	if(isset($_SESSION['form_success'])) {
		unset($_SESSION['form_success']); 
	}
?>   