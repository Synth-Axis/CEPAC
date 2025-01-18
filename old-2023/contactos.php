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
.odd_email{position: absolute; top: 3px; left: 680px;}
</style>
	<section id="contacts" class="top">
		<div class="container flex background-brown">
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3113.1374587388086!2d-9.157811485160831!3d38.714652965301354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19337d20aeb2c5%3A0x79143eb28c3b352a!2sR.%20de%20Santo%20Amaro%2043%2C%201200-673%20Lisboa!5e0!3m2!1spt-PT!2spt!4v1633296181211!5m2!1spt-PT!2spt" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>	
			<div>
				<div class="block paragraph">
					<h1>Contactos</h1>
					<p>Rua de Santo Amaro, nº 43 | 1200-801 Lisboa (<a href="#">ver mapa</a>)</p>
					<p>(+351) 213 973 030<br><a href="mailto:geral@cepac.pt">geral@cepac.pt</a></p>
				</div>	
				<div class="block paragraph">
					<h2>Horário de Funcionamento</h2>
					<p>Segunda a Sexta: das 09h às 13h - 14h às 18h<br>Sábados: das 09h às 13h</p>
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
								<input type="number" name="phone" placeholder="TELEFONE" aria-label="Telefone" required value="<?= isset($_POST["phone"]) ? $_POST["phone"] : '' ?>">
							</div>
						</div>				
						<div>	
							<textarea name="message" placeholder="MENSAGEM" aria-label="Mensagem" required><?= isset($_POST["message"]) ? $_POST["message"] : '' ?></textarea>
							<input class="odd_email" name="email_field" type="text" autocomplete="off" tabindex="1" />
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