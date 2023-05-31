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
    <link rel="stylesheet" href="./Styles/footer.css">
    <style>
        
        
        *
        {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', sans-serif;
        }

        :root {
            --cinzaEscuro: #16171b;
            --cinzaClaro: #222327;
            --white: #f1efef;
            --vermelho: #bb432c;
        }

        body{
            background-color: var(--cinzaEscuro);
        }

        table.table.table-bg {
            display: block;
            padding-top: 5%;
            padding-bottom: 5%;
            padding-left: 20%;
            background-color: var(--cinzaClaro);
            color: white;  
            width: 100%;
            /* align-items: center; */
            justify-content: center;
            margin-top: 10%;

        }

        thead {
            font-size: 15px;

        }

        td , th{
            padding:2%;
            
        }

        .bodyID{
            margin-bottom: 5rem;
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
            border:1px solid var(--vermelho);
            box-shadow: 2px 5px 20px 5px var(--vermelho);

        }

        .imgContainer{
            display:flex;
            align-itens:center;
            justify-content:center;
            width:100%;
            padding-bottom:5%;

        }

        
    </style>

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
                        <div class="sair">
                            <a href="sair.php">SAIR</a>
                        </div>
                    </div>  
            </div>
            
        </div>  
    </header>   
</section>


      <section>
        <div class="m-5"> 
            <table class="table table-bg ">
                <thead>
                    <tr>
                        <th scope="col">Nome Evento</th>
                        <th scope="col">Data Evento</th>
                        <th scope="col">Local</th>
                        <th scope="col">Faixa Etaria</th>
                        <th scope="col">Descrição Evento</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Valor Ingresso</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Imagem Perfil</th>
                        <th scope="col">Imagem Capa</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                            echo "<td>".$user_data['NOME_EVENTO']."</td>";
                            echo "<td>".$user_data['DATA_EVENTO']."</td>";
                            echo "<td>".$user_data['LOCAL']."</td>";
                            echo "<td>".$user_data['FAIXA_ETARIA']."</td>";
                            echo "<td>".$user_data['DESCRICAO_EVENTO']."</td>";
                            echo "<td>".$user_data['ENDERECO']."</td>";
                            echo "<td>".$user_data['VALOR_INGRESSO']."</td>";
                            echo "<td>".$user_data['ENDERECO']."</td>";
                            echo "<td>".$user_data['IMAGEM_PERFIL']."</td>";
                            echo "<td>".$user_data['IMAGEM_CAPA']."</td>";


                    }
                    ?>
                </tbody>
            </table>
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

<script>
    var search = document.getElementById('pesquisar');

    function searchData()
    {
        window.alert("Chamou a função ");
        window.location = "meusEventos.php?search="+search.value;
    }
</script>