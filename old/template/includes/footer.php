		<?php if($currentPage == "index.php") : ?>            
        <?php else : ?> 
        	<div class="logos-footer">
        		<img src="images/barra-logos-footer.jpg" alt="">
        	</div>
			<footer>	
				<div class="first flex">
					<div class="logotipo">
						<img src="images/cepac-logotipo-30-anos.png" alt="Logotipo do CEPAC de 30 anos">
					</div>
					<div class="texts">
						<div>
							<p class="white bold">Contactos</p>
							<p class="brown">Centro Padre Alves Correia</p>
							<p class="brown">Rua de Santo Amaro, nº 43<br>1200-801 Lisboa (<a href="#">ver mapa</a>)</p>
							<p class="brown">(+351) 213 973 030<br><a href="mailto:geral@cepac.pt">geral@cepac.pt</a></p>
						</div>	
						<div class="two">
							<p class="white bold">Horário de Funcionamento:</p>
							<p class="white">Segunda a Sexta: </span><span class="brown">das 09h às 13h - 14h às 18h</span><br><span class="white">Sábados: </span><span class="brown">das 09h às 13h</span></p>
						</div>	
					</div>
					<div class="flex texts-media">
						<div class="texts">
							<p class="white bold">Com o seu apoio, Construímos Esperança</p>
							<p><span class="white">CGD</span><br><span class="brown">PT50 0035 0675 00038922730 14</span></p>
							<p><span class="white">Montepio</span><br><span class="brown">PT50 0036 0265 99100023547 06</span></p>
							<p><span class="white">Bankinter</span><br><span class="brown">PT50 0269 0116 00200558403 47</span></p>
							<p><span class="white">MB Way</span><br><span class="brown">(+351) 928 115 571</span></p>
							<p><span class="white">NIPC</span><br><span class="brown">503 007 676</span></p>
							<form method="post" action="includes/form-newsletter.php" class="flex">
	                            <div>
	                                <input type="text" name="email" placeholder="SUBSCREVER NEWSLETTER" aria-label="SUBSCREVER NEWSLETTER" required>
	                            </div>
	                            <div>    
	                                <button type="submit" name="send">ENVIAR</button>
	                            </div>    
	                        </form>
	                    </div>
	                    <div class="media">
	                    	<div>
		                    	<a href="https://www.facebook.com/cepac.pt" target="_blank">
	                                <i class="fab fa-facebook-f icon-animation" aria-hidden="true"></i>
	                            </a>
	                        </div> 
	                        <div>
	                        	<a href="https://www.linkedin.com/company/cepac-centro-padre-alves-correia/" target="_blank">
                                	<i class="fab fa-linkedin-in icon-animation" aria-hidden="true"></i>
                            	</a>
	                        </div>
	                        <div>                               
	                            <a href="https://www.instagram.com/cepac.pt/" target="_blank">
	                                <i class="fab fa-instagram icon-animation" aria-hidden="true"></i>
	                            </a>
	                        </div>       
	                    </div>    
					</div>
				</div>	
				<div class="second flex">	
					<div class="one">
						<a href="#">Política de Privacidade</a>
					</div>				
					<div>
						<a href="https://www.livroreclamacoes.pt/inicio" target="_blank">Livro de Reclamações</a>
					</div>					
					<div>
						<p>Desenvolvido pela <a href="https://creative-minds.pt/" target="_blank">Creative Minds</a></p>
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
					<p>Pedido enviado com sucesso. Obrigado.</p>	
					<?php elseif(isset($_SESSION['form_success']) && $_SESSION['form_success'] === false) : ?>
					<p>O pedido falhou! Por favor, tente novamente.</p>		
					<?php endif; ?>
				</div>			
			</div>	
		</section>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" type="text/javascript"></script>
		<script src="https://kit.fontawesome.com/9be7ef0aa1.js" crossorigin="anonymous"></script>
		<script src="js/script5.js" type="text/javascript"></script>
	</body>
</html>		


<?php 
	if(isset($_SESSION['form_success'])) {
		unset($_SESSION['form_success']); 
	}
?>          