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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festivity</title>
    <link rel="stylesheet" href="./Styles/reset.css">
    <link rel="stylesheet" href="./Styles/header.css">
    <link rel="stylesheet" href="./Styles/banner_TRAP.css">
    <link rel="stylesheet" href="./Styles/main_TRAP.css">
    <link rel="stylesheet" href="./Styles/footer.css">
    
</head>
<body>
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
                
                <a href="GerenciarUsuarios.php">
                    <p>Gerenciar Usuarios</p>
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

    <section class="banner">
        <div class="banner_evento">
            <img src="./images/TrapFestival.jpg" alt="">
            <div class="banner_background_layer"></div>
        </div>
    </section>
    <main>
        <div class="main_container">
            <h1 id="titulo_evento">Titanium - Real Trap Festival - </h1>

            
            <div class="midias_sociais_do_evento">
                <a href=""><img class="logo_midias_sociais" src="./images/instagram.png" alt="insta-logo"></a>
                <a href=""><img class="logo_midias_sociais" src="./images/twitter.png" alt="twitter-logo"></a>
                <a href=""><img class="logo_midias_sociais" src="./images/whatsapp.png" alt="whats-logo"></a>
            </div>
            
        </div>

        <div class="dados_evento">

            <div class="data_horario">
                <h2 class="subtitulo_dados_evento"><img class="icone_dados" src="./images/relogio.png" alt="relogio-icone"> Data e Horario:</h2>
                <p class="info_evento">Dia 16 de outubro - Apartir de 20:00h</p>
            </div>

            <div class="endereco">
                <h2 class="subtitulo_dados_evento"><img class="icone_dados" src="./images/local.png" alt="local-logo"> Endereço do Evento:</h2>
                <p  class="info_evento" >CEAR - Centro Internacional de Convenção -</p>
                
            </div>

            <div class="faixa_etaria">
                <h2 class="subtitulo_dados_evento"> <img class="icone_dados" src="./images/grupo-de-idade.png" alt="faixa-teraria-logo"> Faixa Etaria:</h2>
                <p  class="info_evento">Proibido para menores de 18 anos</p>   
            </div>
            
        </div>

        <div class="descricao_evento">
            <div class="descricao">
                <h3 class="titulo_descricao">Descrição Evento</h3>
                <p class="txt_descricao">Pra você que estava com saudades de um rolezinho da TITANIUM, se prepara, porque no dia 16 de outubro o nosso queridíssimo Real trap festival vem COM TUDOOO trazendo muita bebida, música boa, integração, fantasia e bagunçaaaaa ✨️✨️</p>
                <p class="txt_descricao">Então já salvem a data aí pra não esquecer: dia 16 de outbro, das 14h às 22h, é dia de entortarrr 🤪</p>
            </div>
            <div class="info_organizadores">
                <div class="desc_organizadores">
                    <img class="img_logo_organizador_evento" src="./images/TrapFestival.jpg" alt="capa_festa">
                    
                </div>
                <div>
                    <h3 class="titulo_descricao">Organizador Do Evento</h3>
                    <p>TITANIUM</p>
                    <p>ENTIDADE ORGANIZADORA DE EVENTOS</p>
                </div>
                
            </div>
        </div>

        <div class="container_compra">

            <div class="politica_cancelamento">
                <div class="info_cancelamento">
                    <h3>Políticas de Cancelamento</h3>
                    <p>Solicitação de cancelamento pode ser feita em até 7 dias corridos após a compra, desde que seja feita antes de 48 horas do início do evento. Para tirar dúvidas sobre o cancelamento de ingressos do evento é necessário entrar em contato com a Entidade Organizadora do evento.</p>
                </div> 
            </div>

            <div class="compra_ingressos">
                <div class="V_I_P">
                    <div class="lote_atual">
                        <p>Primeiro Lote V.I.P :</p>
                    </div>

                    <div class="valor_ingresso">
                        <p>R$   250,00</p>
                        <div class="botoes_compra">
                            <button class="botao"><img class="icon_compra" src="./images/sinal-de-menos.png" alt=""></button>
                            <p>0</p>
                            <button class="botao"><img class="icon_compra" src="./images/mais.png" alt=""></button>
                        </div>
                    </div>     
                </div>

                <div class="pista">
                    <div class="lote_atual">
                        <p>Primeiro Lote Pista :</p>
                    </div>

                    <div class="valor_ingresso">
                        <p>R$   200,00</p>
                        <div class="botoes_compra">
                            <button class="botao"><img class="icon_compra" src="./images/sinal-de-menos.png" alt=""></button>
                            <p>0</p>
                            <button class="botao"><img class="icon_compra" src="./images/mais.png" alt=""></button>
                        </div>
                    </div>
                </div>
                <div class="pista_meia_entrada">
                    <div class="lote_atual">
                        <p>Primeiro Lote Pista Meia Entrada :</p>
                    </div>

                    <div class="valor_ingresso">
                        <p>R$   150,00</p>
                        <div class="botoes_compra">
                            <button class="botao"><img class="icon_compra" src="./images/sinal-de-menos.png" alt=""></button>
                            <p>0</p>
                            <button class="botao"><img class="icon_compra" src="./images/mais.png" alt=""></button>
                        </div>
                    </div> 
                </div>
            </div>
            
        </div>
        

    </main> 

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
</body>
</html>