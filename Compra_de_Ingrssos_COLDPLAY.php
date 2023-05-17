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
    <link rel="stylesheet" href="./Styles/banner_coldplay.css">
    <link rel="stylesheet" href="./Styles/main_coldplay.css">
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
            <img src="./images/coldplay.jpg" alt="">
            <div class="banner_background_layer"></div>
        </div>
    </section>
    <main>
        <div class="main_container">
            <h1 id="titulo_evento">COLDPLAY - MUSIC OF THE SPHERES -  </h1>

            <div class="midias_sociais_do_evento">
                <a href=""><img class="logo_midias_sociais" src="./images/instagram.png" alt="insta-logo"></a>
                <a href=""><img class="logo_midias_sociais" src="./images/twitter.png" alt="twitter-logo"></a>
                <a href=""><img class="logo_midias_sociais" src="./images/whatsapp.png" alt="whats-logo"></a>
            </div>
        </div>

        <div class="dados_evento">

            <div class="data_horario">
                <h2 class="subtitulo_dados_evento"><img class="icone_dados" src="./images/relogio.png" alt="relogio-icone"> Data e Horario:</h2>
                <p class="info_evento">Dia 19 de maio - Apartir de 22:00h</p>
            </div>

            <div class="endereco">
                <h2 class="subtitulo_dados_evento"><img class="icone_dados" src="./images/local.png" alt="local-logo"> Endereço do Evento:</h2>
                <p  class="info_evento" >CENTRAL PARK OLINPICK</p>
                
            </div>

            <div class="faixa_etaria">
                <h2 class="subtitulo_dados_evento"> <img class="icone_dados" src="./images/grupo-de-idade.png" alt="faixa-teraria-logo"> Faixa Etaria:</h2>
                <p  class="info_evento">Proibido para menores de 18 anos</p>   
            </div>
            
        </div>

        <div class="descricao_evento">
            <div class="descricao">
                <h3 class="titulo_descricao">Descrição Evento</h3>
                <p class="txt_descricao">Não perca a oportunidade de ver o Coldplay!!</p>
                <p class="txt_descricao">Não percam sua tour!!</p>
            </div>
            <div class="info_organizadores">
                <div class="desc_organizadores">
                    <img class="img_logo_organizador_evento" src="./images/coldplay.jpg" alt="capa_festa">
                    
                </div>
                <div>
                    <h3 class="titulo_descricao">Organizador Do Evento</h3>
                    <p>COLDPLAY</p>
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
        <div class="footerInformation">
            <p>cliente@aleatorio.com.br</p>
            <p>Todos os direitos reservados</p>
            <p>Nossas redes! <a target="_blank" href="https://i.pinimg.com/originals/fd/35/14/fd351489cccd7642ca81b5e38a3154f5.jpg"><img src="./images/insta.png" alt=""></a></p>
        </div>
    </footer>
</body>
</html>