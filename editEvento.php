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

    if(!empty($_GET['id']))
    {   
        //faz referencia ao config
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM evento WHERE ID_EVENTO = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result))
            {
            $nomePagina = $user_data['NOME_EVENTO'];
            $descEvento = $user_data['DESCRICAO_EVENTO'];
            $enderecoEvento = $user_data['ENDERECO'];
            $dataEHorario = $user_data['DATA_EVENTO'];
            $valor = $user_data['VALOR_INGRESSO'];
            $faixaEtaria = $user_data['FAIXA_ETARIA'];

            }

        }


        else{
            header('Location: MeusEventos.php');
        }

       
        
        //insere no bd

        $sqlUpdate = "UPDATE evento SET NOME_EVENTO='$nomePagina',DESCRICAO_EVENTO='$descEvento',ENDERECO='$enderecoEvento',DATA_EVENTO='$dataEHorario',VALOR_INGRESSO='$valor',FAIXA_ETARIA='$faixaEtaria'
        WHERE ID_EVENTO = '$id'";

        $result = $conexao->query($sqlUpdate);

    
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

        $sql_query = $conexao->query("SELECT IMAGEM_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado'");

    
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Eventos</title>
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
                    <h1>EDITE SEU EVENTO!</h1>
                    
                </div>
                <div class="dados_evento">
                    <form action="saveEditEvento.php"  method="POST" class="clienteDados" name="clienteForm" >
                        <div class="secao1">
                            <p class="secao_registro">01| Preencha alguns dados sobre seu evento </p>
                            <p class="campo_registro">Nome da Página*</p>
                            <input value=<?php echo $nomePagina;?> name="nomeEvento" class="input_nome_evento" placeholder="Ex: chopada de medicina, show coldplay, Festival de Curitiba" type="text">
                            <p class="campo_registro">Descrição do Evento*</p>
                            <input value=<?php echo $descEvento;?> name="descEvento" class="input_desc_evento" placeholder="Ex: descreva um pouco sobre o evento" type="text">
                        </div>
                        
                        <div class="secao3">
                            <p class="secao_registro">02|Preencha Informações sobre localidade e compra</p>
                            <p class="campo_registro">Endereço do Evento*</p>
                            <input value=<?php echo $enderecoEvento;?>  name="endereco" class="input_info_evento" placeholder="Ex: Evenida das Americas - CURITIBA / PR" type="text">
                            <p class="campo_registro">Data e Horario*</p>
                            <input value=<?php echo $dataEHorario;?> name="dataEhora" class="input_info_evento" placeholder="Ex: 05 de abril • 23:00 até 06 de abril • 05:00" type="text">
                            <p class="campo_registro">Valor Ingressos*</p>
                            <input value=<?php echo $valor;?> name="valor" class="input_info_evento" placeholder="Ex:Primeiro lote 80R$, Segundo lote 160R$, Lote V.I.P 300R$" type="text">
                            <p class="campo_registro">Faixa Etaria do Evento*</p>
                            <input 
                            value=<?php echo $faixaEtaria;?>  
                            name="faixaEtaria" 
                            class="input_info_faixa_etaria" 
                            placeholder="Ex: Proibido para menores de 18 anos" 
                            type="text"
                            >

                        </div>
                        <div class="secao4">
                            <p class="secao_registro">03|Persolanize sua Pagina de Evento</p>
                            <form action="/upload" method="post" enctype="multipart/form-data">
                                <p class="campo_registro">Imagem de Perfil*</p>
                                <input type="file" name="fileUpload" multiple>
                                <p class="campo_registro">Imagem de Capa*</p>
                                <input type="file" name="fileUpload" multiple>
                            </form>

                            <input type="hidden" name="idEve" value=<?php echo $id;?>>


                            <div class="botoes">
                                <button type="submit" name="updateEve" id="updateEve" class="button">EDITAR PAGINA</button>
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