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

    include_once('config.php');
    $sql_query = $conexao->query("SELECT IMAGEM_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado'");

    $sqlEvento = "SELECT ID_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado'";

    $result = $conexao->query($sqlEvento);

    $fetch = (mysqli_fetch_array($result));

    $id = $fetch['ID_ORGANIZADOR'];

    $id  = intval($id);


    

    if(isset($_POST['submit']))
    {   
        //faz referencia ao config
        include_once('config.php');

        //armazena os valoras dos formularios em variaveis
        $idOrg =  $id;
        $nomeEvento  = $_POST['nomeEvento'];
        $dataEhora = $_POST['dataEhora'];
        $local = $_POST['local'];
        $faixaEtaria = $_POST['faixaEtaria'];
        $descEvento = $_POST['descEvento'];
        $endereco = $_POST['endereco'];          
        $valor = $_POST['valor'];
        

        
        //insere no bd
        $result = mysqli_query($conexao, "INSERT INTO EVENTO(NOME_EVENTO,DATA_EVENTO,FAIXA_ETARIA,DESCRICAO_EVENTO,ENDERECO,VALOR_INGRESSO) VALUES ('$nomeEvento','$dataEhora','$faixaEtaria','$descEvento','$endereco','$valor')");
        
        $logado= session_name();


    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000)) {
        // last request was more than 10 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        echo "Session is expired at " .  gmdate("H:i:s", time()) .  "<br/>";
        header('Location: telaLogin.php');
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
    $logado = $_SESSION['emailOrganizador'];
    }


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
            <div class="headerTextoContainer">
                <div class="headerOptions">
                    <a href="MeusEventos.php">
                        <p>Meus Eventos</p>
                    </a>
                    <a href="CadastroEvento.php">
                        <p>Cadastre um evento</p>
                    </a>
                    <a href="gerenciarUsuariosOrg.php">
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
                        <?php 
                        while($arquivo = $sql_query->fetch_assoc()){
                    ?>
                        <div class="imagemPerfil">
                                <img height="60px" src="<?php echo $arquivo['IMAGEM_ORGANIZADOR']; ?>" />
                        </div>
                    <?php 
                        }
                    ?>
                        <div class="sair">
                            <a href="sair.php">SAIR</a>
                        </div>
                    </div>  
            </div>
            
        </div>  
    </header>   
</section>


    <main class="main">
        <div class="main-container">
            <div class="dados_conatiner">
                <div class="titulo_cadastro">
                    <h1>CADASTRE AQUI SEU EVENTO!</h1>
                    
                </div>
                <div class="dados_evento">
                    <form action="CadastroEvento.php"  method="POST" class="clienteDados" name="clienteForm" >
                        <div class="secao1">
                            <p class="secao_registro">01| Preencha alguns dados sobre seu evento </p>
                            <p class="campo_registro">Nome da Página*</p>
                            <input name="nomeEvento" class="input_nome_evento" placeholder="Ex: chopada de medicina, show coldplay, Festival de Curitiba" type="text">
                            <p class="campo_registro">Descrição do Evento*</p>
                            <input name="descEvento" class="input_desc_evento" placeholder="Ex: descreva um pouco sobre o evento" type="text">
                        </div>
                        <div class="secao3">
                            <p class="secao_registro">02|Preencha Informações sobre localidade e compra</p>
                            <p class="campo_registro">Endereço do Evento*</p>
                            <input name="endereco" class="input_info_evento" placeholder="Ex: Evenida das Americas - CURITIBA / PR" type="text">
                            <p class="campo_registro">Local do Evento*</p>
                            <input name="local" class="input_info_evento" placeholder="Ex: Teatro das  Americas" type="text">
                            <p class="campo_registro">Data e Horario*</p>
                            <input name="dataEhora" class="input_info_evento" placeholder="Ex: 2020-04-03 12:33:00" type="text">
                            <p class="campo_registro">Valor Ingressos*</p>
                            <input name="valor" class="input_info_evento" placeholder="Ex:Primeiro lote 80R$, Segundo lote 160R$, Lote V.I.P 300R$" type="text">
                            <p class="campo_registro">Faixa Etaria do Evento*</p>
                            <input name="faixaEtaria" class="input_info_faixa_etaria" placeholder="Ex: Proibido para menores de 18 anos" type="text">
                        </div>
                        <div class="secao4">
                            <p class="secao_registro">03|Persolanize sua Pagina de Evento</p>
                            <form action="/upload" method="post" enctype="multipart/form-data">
                                <p class="campo_registro">Imagem de Perfil*</p>
                                <input type="file" name="fileUpload" multiple>
                                <p class="campo_registro">Imagem de Capa*</p>
                                <input type="file" name="fileUpload" multiple>
                            </form>
                            <div class="botoes">
                                <button type="submit" name="submit" class="button">CRIAR PAGINA</button>
                            </div>
                        </div>
                    </form>

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