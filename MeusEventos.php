<?php
    //inicia a sessão
    session_start();
    
    include_once('config.php');


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
    


    //$sqlEvento = "SELECT * FROM EVENTO WHERE ID_ORGANIZADOR = (SELECT ID_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado')";

    //$sqlEvento = "SELECT * FROM EVENTO WHERE ID_ORGANIZADOR = (SELECT ID_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado')";

    $sqlEvento = "SELECT * FROM evento ORDER BY ID_EVENTO ";

    $result = $conexao->query($sqlEvento);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Eventos</title>
    <link rel="stylesheet" href="./Styles/header.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
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
            <div class="headerTextoContainer">
                <div class="headerOptions">
                    <a href="meusEventos.php">
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
                        <div class="sair">
                            <a href="sair.php">SAIR</a>
                        </div>
                    </div>  
            </div>
            
        </div>  
    </header>   
</section>

<main>
        <div class="mainContainer">

            <div class="item">
                <div class="tituloMain"><h1>Meus Eventos</h1></div>
            
                <div class="tituloEvento"><h2>COLDPLAY: Music of the spheres</h2></div>

                <div class="eventoContainer">
                    
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

            
        </div>
    </main>

     <!-- <section>
        <div class="m-5"> 
            <table class="table table-bg ">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Nome Evento</th>
                        <th scope="col">Data Evento</th>
                        <th scope="col">Local</th>
                        <th scope="col">Faixa Etaria</th>
                        <th scope="col">Descrição Evento</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">#id Organizador</th>
                        <th scope="col">Valor Ingresso</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Imagem Perfil</th>
                        <th scope="col">Imagem Capa</th>
                        <th scope="col">...</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                            echo "<td>".$user_data['ID_EVENTO']."</td>";
                            echo "<td>".$user_data['NOME_EVENTO']."</td>";
                            echo "<td>".$user_data['DATA_EVENTO']."</td>";
                            echo "<td>".$user_data['LOCAL']."</td>";
                            echo "<td>".$user_data['FAIXA_ETARIA']."</td>";
                            echo "<td>".$user_data['DESCRICAO_EVENTO']."</td>";
                            echo "<td>".$user_data['ENDERECO']."</td>";
                            echo "<td>".$user_data['ID_ORGANIZADOR']."</td>";
                            echo "<td>".$user_data['VALOR_INGRESSO']."</td>";
                            echo "<td>".$user_data['ENDERECO']."</td>";
                            echo "<td>".$user_data['IMAGEM_PERFIL']."</td>";
                            echo "<td>".$user_data['IMAGEM_CAPA']."</td>";


                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section> -->
        
</body>
</html>