<?php
    //inicia a sessão
    session_start();
    

    //verifica se esxiste uma variavel email na sua sessão
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
    {
        //caso não esxita te joga para o login e destroi os dados atuais
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: telaLogin.php');
    }
    //caso exista cria a variavel logado e passa o valor do input de email para ela
    $logado = $_SESSION['email'];

    $logado= session_name();


    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000)) {
        // last request was more than 10 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        echo "Session is expired at " .  gmdate("H:i:s", time()) .  "<br/>";
        header('Location: telaLogin.php');
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
    $logado = $_SESSION['email'];
?>


<head>
    <link rel="stylesheet" href="./Styles/reset.css">
    <link rel="stylesheet" href="./Styles/Home.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Zen+Antique&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Styles/header.css">
    <link rel="stylesheet" href="./Styles/footer.css">
</head>
<body>
<section class="bodyID">
    <header class="headerID">
        <div class="sectionHeader">
            <div class="logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="headerTextoContainer">
                <div class="headerOptions">
                    <a href="home.php">
                        <p>Home</p>
                    </a>
                    </a>
                    <a href="gerenciarUsuarios.php">
                        <p>Gerenciar Usuarios</p>
                    </a>
                </div>
            </div>

            <div class="sectionLoginSearch">
                    <div class="loginEcadastro">
                        <div>
                        <?php
                            echo "<h1><u>$logado</u></h1>";
                        ?>
                        </div>
                        <div class="sair">
                            <a href="sair.php">SAIR</a>
                        </div>
                    </div>  
            </div>
            
        </div>  
    </header>   
</section>
    <section class="apresentacao">
        <h2>Compre aqui o ingresso para seus eventos favoritos</h2>
    </section>
    <section class="centerContent">
        <div class="containerPrincipal">
            <div class="anuncioEvento">
                <img src="./images/TrapFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Real Trap Festival</h3>
                    <p>Pra você que estava com saudades de um rolezinho da TITANIUM, se prepara, porque no dia 16 de outubro o nosso queridíssimo Real trap festival vem COM TUDOOO trazendo muita bebida, música boa, integração, fantasia e bagunçaaaaa</p>
                    <p>Dia e hora: Ainda não defenida</p>
                </div>
                <div class="butomsAnuncio">
                    <button class="original-button"><a href="./Compra_de_Ingrssos_TRAP.php">Comprar</a></button>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/coldplay.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Coldplay Music of the spheres</h3>
                    <p>Uma noite mágica sob as estrelas com o Coldplay, Não percam esta oportunidade</p>
                    <p>Dia e hora: Dia 21 e 22 de MArço, Apartir de 22:00</p>
                </div>
                <div class="butomsAnuncio coldplay">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COLDPLAY.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/TrapFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Real Trap Festival</h3>
                    <p>Pra você que estava com saudades de um rolezinho da TITANIUM, se prepara, porque no dia 16 de outubro o nosso queridíssimo Real trap festival vem COM TUDOOO trazendo muita bebida, música boa, integração, fantasia e bagunçaaaaa</p>
                    <p>Dia e hora: Ainda não defenida</p>
                </div>
                <div class="butomsAnuncio">
                    <button class="original-button"><a href="./Compra_de_Ingrssos_TRAP.php">Comprar</a></button>
                </div>
            </div>

            <div class="anuncioEvento">
                <img src="./images/countryFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Country Fastival</h3>
                    <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                    <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/rockinrio.png" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Rock In Rio</h3>
                    <p>O Rock in Rio é mais do que um evento, é uma experiência única e inesquecível para todos os amantes da música.</p>
                    <p>Dia e hora: Dia 8 de setembro, Apartir de 14:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_ROCK.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/rockinrio.png" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Rock In Rio</h3>
                    <p>O Rock in Rio é mais do que um evento, é uma experiência única e inesquecível para todos os amantes da música.</p>
                    <p>Dia e hora: Dia 8 de setembro, Apartir de 14:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_ROCK.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/countryFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Country Fastival</h3>
                    <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                    <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.php">Comprar</a></button>
                    </div>
                </div>
            </div>

            <div class="anuncioEvento">
                <img src="./images/countryFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Country Fastival</h3>
                    <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                    <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/rockinrio.png" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Rock In Rio</h3>
                    <p>O Rock in Rio é mais do que um evento, é uma experiência única e inesquecível para todos os amantes da música.</p>
                    <p>Dia e hora: Dia 8 de setembro, Apartir de 14:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_ROCK.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/countryFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Country Fastival</h3>
                    <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                    <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.php">Comprar</a></button>
                    </div>
                </div>
            </div>
            <div class="anuncioEvento">
                <img src="./images/countryFestival.jpg" alt="">
                <div class="textosEvento">
                    <h3 class="EventTitle">Country Fastival</h3>
                    <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                    <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
                </div>
                <div class="butomsAnuncio">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.php">Comprar</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<footer>
   
    <div class="container">
        <img src="./images/instagram.png" />
        <img src="./images/linkedin.png "/>
        <img src="./images/tiktok.png "/>
        <img src="./images/twitter-sign.png "/>
        <img src="./images/youtube.png "/>
    </div>
    <div class="textContainer">
        <h3>Festivity</h3>
        <p>@Copyright 2008-2015</p>
        <p>All rights reserved. Powered by the Festivity </p>
    </div>

</footer>
</html>