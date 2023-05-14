<?php
    //inicia a sessão
    session_start();
    


    //verifica se esxiste uma variavel email na sua sessão
    if((!isset($_SESSION['emailOrganizador']) == true) and (!isset($_SESSION['senhaOrganizador']) == true))
    {
        //caso não esxita te joga para o login e destroi os dados atuais
        unset($_SESSION['emailOrganizador']);
        unset($_SESSION['senhaOrganizador']);
        header('Location: telaLogin.php');
    }
    //caso exista cria a variavel logado e passa o valor do input de email para ela
    $logado = $_SESSION['emailOrganizador'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
    <link rel="stylesheet" href="./Styles/reset.css">
    <link rel="stylesheet" href="./Styles/header.css">
    <link rel="stylesheet" href="./Styles/TelaCadastro.css">
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
    <main class="main">
        <div class="main-container">
            <aside>
                <img class="img-aside" src="./images/festa de evento.jpg" alt="imgame-festa">
            </aside>
            <div class="dados_conatiner">
                <div class="titulo_cadastro">
                    <h1>CADASTRE AQUI SEU EVENTO!</h1>
                    
                </div>
                <div class="dados_evento">
                    <div class="secao1">
                        <p class="secao_registro">01| Preencha alguns dados sobre seu evento </p>
                        <p class="campo_registro">Nome da Página*</p>
                        <input class="input_nome_evento" placeholder="Ex: chopada de medicina, show coldplay, Festival de Curitiba" type="text">
                        <p class="campo_registro">Descrição do Evento*</p>
                        <input class="input_desc_evento" placeholder="Ex: descreva um pouco sobre o evento" type="text">
                    </div>
                    <div class="secao2">
                        <p class="secao_registro">02| Preencha as redes sociais do evento</p>
                        <div class="redes_sociais">
                            <input class="input_redes_evento" placeholder="Ex: Instagram" type="text">
                            <input class="input_redes_evento" placeholder="Ex: Twitter" type="text">
                        </div>
                    </div>
                    <div class="secao3">
                        <p class="secao_registro">03|Preencha Informações sobre localidade e compra</p>
                        <p class="campo_registro">Endereço do Evento*</p>
                        <input class="input_info_evento" placeholder="Ex: Campinas Hall - CURITIBA / PR" type="text">
                        <p class="campo_registro">Data e Horario*</p>
                        <input class="input_info_evento" placeholder="Ex: 05 de abril • 23:00 até 06 de abril • 05:00" type="text">
                        <p class="campo_registro">Valor Ingressos*</p>
                        <input class="input_info_evento" placeholder="Ex:Primeiro lote 80R$, Segundo lote 160R$, Lote V.I.P 300R$" type="text">
                        <p class="campo_registro">Faixa Etaria do Evento*</p>
                        <input class="input_info_faixa_etaria" placeholder="Ex: Proibido para menores de 18 anos" type="text">
                    </div>
                    <div class="secao4">
                        <p class="secao_registro">04|Persolanize sua Pagina de Evento</p>
                        <form action="/upload" method="post" enctype="multipart/form-data">
                            <p class="campo_registro">Imagem de Perfil*</p>
                            <input type="file" name="fileUpload" multiple>
                            <p class="campo_registro">Imagem de Capa*</p>
                            <input type="file" name="fileUpload" multiple>
                        </form>
                        <div class="botoes">
                            <button class="button">VOTLAR</button>
                            <button class="button">CRIAR PAGINA</button>
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