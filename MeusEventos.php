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
    <title>Meus Eventos</title>
    <link rel="stylesheet" href="./Styles/header.css">
    
    <link rel="stylesheet" href="./Styles/MeusEventos.css">
    <link rel="stylesheet" href="./Styles/reset.css">
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
                <a href="CadastroEvento.php">
                    <p>Cadastre um evento</p>
                </a>
                <a href="GerenciarUsuarios.php">
                    <p>Gerenciar Usuarios</p>
                </a>
                <a href="MeusEventos.php">
                    <p>Meus Eventos</p>
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

    <main>
        <div class="mainContainer">

            <div class="tituloMain"><h1>Meus Eventos</h1></div>
            
            <div class="tituloEvento"><h2>COLDPLAY: Music of the spheres</h2></div>

            <div class="eventoColdplay">
                
                <div class="linha1">
                    <p>Status Vendas: Fechadas</p>
                    <p>Data: Dia 21 e 22 de Março</p>
                    <p>Lote Atual: 1º</p>
                </div>
                
                <div class="linha2">
                    <p>Ingressos Vendidos: 0</p>
                    <p>Faixa Etaria: 18</p>
                    <p>Horario: Apartir de 22:00h</p>
                </div>
                <div class="linha3">
                    <div class="butomsAnuncio">
                        <button class="original-button"><a href="./Compra_de_Ingrssos_COLDPLAY.html">Visitar pagina</a></button>
                    </div>
    
                    <div class="organizadoraEvento">
                        
                        <div class="desc_organizadores">
                            <img class="img_logo_organizador_evento" src="./images/coldplay.jpg" alt="capa_festa"> 
                        </div>
                        <div>
                            <h3 class="titulo_descricao">Organizador Do Evento</h3>
                            <p class="txt_descricao">COLDPLAY</p>
                            <p class="txt_descricao">ENTIDADE ORGANIZADORA DE EVENTOS</p>
                        </div>
                    </div>
                </div>  
                
    

            </div>

            

        </div>
    </main>

    
</body>
</html>