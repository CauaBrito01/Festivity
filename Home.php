<?php
    //inicia a sessão
    session_start();
    include_once('config.php');


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


?>


<link rel="stylesheet" href="./Styles/reset.css">
<link rel="stylesheet" href="./Styles/Home.css">
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Zen+Antique&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./Styles/header.css">
<link rel="stylesheet" href="./Styles/footer.css">

<section class="bodyID">
    <header class="headerID">
        <div class="sectionHeader">
            <div class="logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="headerOptions">
                <a href="/festivity/Home.php">
                    <p>Home</p>
                </a>
                <a href="../Telas/CadastroEvento.html">
                    <p>Cadastre um evento</p>
                </a>

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
        </div>  
    </header>   
</section>
<section class="centerContent">
    <div class="row1">
        <div class="anuncioEvento">
            <img src="./images/TrapFestival.jpg" alt="">
            <div class="textosEvento">
                <h3 class="EventTitle">Real Trap Festival</h3>
                <p>Pra você que estava com saudades de um rolezinho da TITANIUM, se prepara, porque no dia 16 de outubro o nosso queridíssimo Real trap festival vem COM TUDOOO trazendo muita bebida, música boa, integração, fantasia e bagunçaaaaa</p>
                <p>Dia e hora: Ainda não defenida</p>
            </div>
            <div class="butomsAnuncio">
                <button class="original-button"><a href="./Compra_de_Ingrssos_TRAP.html">Comprar</a></button>
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
                    <button class="original-button"><a href="./Compra_de_Ingrssos_COLDPLAY.html">Comprar</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row2">
        <div class="anuncioEvento">
            <img src="./images/countryFestival.jpg" alt="">
            <div class="textosEvento">
                <h3 class="EventTitle">Country Fastival</h3>
                <p>Vista seu melhor sorriso, suas botas e seu chapéu de cowboy, porque hoje é dia de celebrar o estilo de vida country!</p>
                <p>Dia e hora: Dia 10 de agosto, Apartir de 20:00</p>
            </div>
            <div class="butomsAnuncio">
                <div class="butomsAnuncio">
                    <button class="original-button"><a href="./Compra_de_Ingrssos_COUNTRY.html">Comprar</a></button>
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
                    <button class="original-button"><a href="./Compra_de_Ingrssos_ROCK.html">Comprar</a></button>
                </div>
            </div>
        </div>
    </div>
    
</section>
<footer>
    <div class="footerInformation">
        <p>cliente@aleatorio.com.br</p>
        <p>Todos os direitos reservados</p>
        <p>Nossas redes! <a target="_blank" href="https://i.pinimg.com/originals/fd/35/14/fd351489cccd7642ca81b5e38a3154f5.jpg"><img src="../images/insta.png" alt=""></a></p>
    </div>
</footer>