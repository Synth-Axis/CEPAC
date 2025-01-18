            <?php
            include 'includes/cookies.php';
            include 'includes/headerphp.php';
            ?>

            <header>
                <nav class="navbar">
                    <div class="toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>

                    <ul class="itens animation">
                        <li>
                            <a id="flex" href="inicio.php">
                                <div class="link">INÍCIO</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li class="drop">
                            <div id="flex" class="color">
                                <div class="link">SOBRE NÓS</div>
                                <div class="icon-down">
                                    <img src="images/baixo-castanho.png" alt="">
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="quem-somos.php">QUEM SOMOS</a>
                                <a href="equipa.php">A NOSSA EQUIPA</a>
                                <a href="codigo-conduta.php">CÓDIGO DE CONDUTA</a>
                                <a href="documentos-oficiais.php">DOCUMENTOS OFICIAIS</a>
                                <a href="planos-relatorios.php">PLANOS E RELATÓRIOS</a>
                            </div>
                        </li>
                        <li class="drop drop-two">
                            <div id="flex" class="color">
                                <div class="link">O QUE FAZEMOS</div>
                                <div class="icon-down">
                                    <img src="images/baixo-castanho.png" alt="">
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="atendimento-acompanhamento-social.php">ATENDIMENTO E ACOMPANHAMENTO SOCIAL</a>
                                <a href="insercao-profissional-formacao.php">INSERÇÃO PROFISSIONAL E FORMAÇÃO</a>
                                <a href="servicos-clinicos.php">SERVIÇOS CLÍNICOS</a>
                                <a href="boutique-bu-gosta.php">BOUTIQUE BU GOSTA</a>
                                <a href="mercearia-sabura.php">MERCEARIA SABURA</a>
                                <a href="voluntariado.php">SERVIÇO DE VOLUNTARIADO</a>
                                <a href="comunicacao.php">COMUNICAÇÃO</a>
                            </div>
                        </li>
                        <li>
                            <a id="flex" href="apoio.php">
                                <div class="link">APOIAR</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a id="flex" href="noticias.php">
                                <div class="link">NOTÍCIAS</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a id="flex" href="projetos.php">
                                <div class="link">PROJETOS</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a id="flex" href="redes.php">
                                <div class="link">REDES E PARCERIAS</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a id="flex" href="contactos.php">
                                <div class="link">CONTACTOS</div>
                                <div class="icon-left">
                                    <img src="images/direita-castanho.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="logo">
                        <a href="inicio.php">
                            <img src="images/cepac-logotipo.png" alt="Logotipo do CEPAC">
                        </a>
                    </div>

                    <div class="right flex">
                        <div class="btn">
                            <a href="apoio.php">
                                <div class="blue border-blue">
                                    QUERO APOIAR
                                </div>
                            </a>
                        </div>
                        <div class="btn">
                            <a href="atendimento-acompanhamento-social.php">
                                <div class="brown border-brown">
                                    PROCURO APOIO
                                </div>
                            </a>
                        </div>

                        <div class="social">
                            <a href="<?= $content[25]["text"]; ?>" target="_blank">
                                <i class="fab fa-facebook-f icon-animation" aria-hidden="true"></i>
                            </a>
                            <a href="<?= $content[199]["text"]; ?>" target="_blank">
                                <i class="fab fa-linkedin-in icon-animation" aria-hidden="true"></i>
                            </a>
                            <a href="<?= $content[26]["text"]; ?>" target="_blank">
                                <i class="fab fa-instagram icon-animation" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </header>


            <div class="phone">
                <a href="https://wa.me/+<?= $content[243]["text"]; ?>" target="_blank">
                    <img src="images/telefone.png" alt="">
                </a>
            </div>