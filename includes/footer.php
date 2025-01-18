		<?php if($currentPage == "index.php") : ?>            
        <?php else : ?> 
        	<div class="logos-footer">
        		<img src="<?= $footerimages[0]["folder"]; ?>" alt="Imagem">
        	</div>
			<footer id="footer">	
				<div class="first flex">
					<div class="logotipo">
						<img src="<?= $footerimages[1]["folder"]; ?>" alt="Logotipo do CEPAC de 30 anos">
					</div>
					<div class="texts">
						<div>
							<p class="white bold"><?= $content[3]["text"]; ?></p>
							<p class="brown"><?= $content[4]["text"]; ?> (<a href="<?= $content[5]["text"]; ?>" target="_blank">ver mapa</a>)</p>
							<p class="brown"><?= $content[6]["text"]; ?><br><a href="mailto:<?= $content[7]["text"]; ?>"><?= $content[7]["text"]; ?></a></p>
						</div>	
						<div class="two">
							<p class="white bold"><?= $content[8]["text"]; ?></p>
							<p class="white"><?= $content[9]["text"]; ?> </span><span class="brown"><?= $content[10]["text"]; ?></span><br><span class="white"><?= $content[11]["text"]; ?> </span><span class="brown"><?= $content[12]["text"]; ?></span></p>
						</div>	
					</div>
					<div class="flex texts-media">
						<div class="texts">
							<p class="white bold"><?= $content[13]["text"]; ?></p>
							<p><span class="white"><?= $content[14]["text"]; ?></span><br><span class="brown"><?= $content[15]["text"]; ?></span></p>
							<p><span class="white"><?= $content[16]["text"]; ?></span><br><span class="brown"><?= $content[17]["text"]; ?></span></p>
							<p><span class="white"><?= $content[18]["text"]; ?></span><br><span class="brown"><?= $content[19]["text"]; ?></span></p>
							<p><span class="white"><?= $content[20]["text"]; ?></span><br><span class="brown"><?= $content[21]["text"]; ?></span></p>
							<form method="post" action="includes/form-newsletter.php" class="flex">
	                            <div>
	                                <input type="email" name="email" placeholder="SUBSCREVER NEWSLETTER" aria-label="SUBSCREVER NEWSLETTER" required>
	                            </div>
	                            <div>    
	                                <button type="submit" name="send">ENVIAR</button>
	                            </div> 
	                        </form>
							<div>
								  <p class="cient"><?= $content[22]["text"]; ?> <u><a style="color: #FFF !important; font-size: 10px !important;" href="politica-privacidade.php" target="_blank"><?= $content[23]["text"]; ?></a></u> <?= $content[24]["text"]; ?></p> 
								  </div>
	                    </div>
	                    <div class="media">
	                    	<div>
		                    	<a href="<?= $content[25]["text"]; ?>" target="_blank">
	                                <i class="fab fa-facebook-f icon-animation" aria-hidden="true"></i>
	                            </a>
	                        </div> 
	                        <div>                               
	                            <a href="<?= $content[26]["text"]; ?>" target="_blank">
	                                <i class="fab fa-instagram icon-animation" aria-hidden="true"></i>
	                            </a>
	                        </div>   
	                    </div>    
					</div>
				</div>	
				<div class="second flex foot">	
					<div class="one">
						<a href="#"></a>
					</div>				
					<div>
						<a href="https://www.livroreclamacoes.pt/inicio" target="_blank">
							<img style="width: 170px;"src="./images/livro-reclamacoes-170x70-w.png" alt="">
						</a>
					</div>					
					<div>
						<p><a href="politica-privacidade.php" target="_blank"><?= $content[23]["text"]; ?> </a></p>
					</div>
				</div>		
			</footer>
		<?php endif; ?>	

		<section class="popup-form" style="<?php echo isset($_SESSION['form_success']) ? 'display: block' : ''; ?>">
			<div class="popup-form-content">	
				<div class="popup-form-close">
					<img src="images/fechar.png" alt="Ícone de fechar">
				</div>
				<div class="popup-form-text">
					<?php if(isset($_SESSION['form_success']) && $_SESSION['form_success'] === true) : ?>
						<h2>Obrigado</h2>
						<p>pela sua Subscrição</p>
						<span class="popup-line"><hr></span>
					<?php elseif(isset($_SESSION['form_success']) && $_SESSION['form_success'] === false) : ?>
						<h2>O pedido falhou!</h2>
						<p>Por favor, tente novamente</p>
						<span class="popup-line"><hr></span>
					<?php endif; ?>
				</div>			
			</div>	
		</section>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" type="text/javascript"></script>
		<script src="https://kit.fontawesome.com/9be7ef0aa1.js" crossorigin="anonymous"></script>
		<script src="js/script9.js" type="text/javascript"></script>
	</body>
</html>		


<?php 
	if(isset($_SESSION['form_success'])) {
		unset($_SESSION['form_success']); 
	}
?>          