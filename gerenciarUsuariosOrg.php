<?php
    //inicia a sessão
    session_start();
    include_once('config.php');

    //caso exista cria a variavel logado e passa o valor do input de email para ela
    

    $logado = $_SESSION['emailOrganizador'];
    
    

    

    $sqlOrg = "SELECT ID_ORGANIZADOR ,NOME_ORGANIZADOR, EMAIL_ORGANIZADOR,CNPJ, TELEFONE_ORGANIZADOR, SENHA_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado'";

    $sql_query = $conexao->query("SELECT IMAGEM_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$logado'");


    $resultOrg = $conexao->query($sqlOrg);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./Styles/header.css">
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
            font-size: 24px;

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
    <style>
        
        

        .bodyID{
            margin-bottom: 5rem;
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
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
   

<section>
    <div class="m-5"> 
        <table class="table table-bg ">
        <thead>
                <tr>
                    <th scope="col">Nome Organizador</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while($user_data = mysqli_fetch_assoc($resultOrg))
                {
                    echo "<tr>";
                        echo "<td>".$user_data['NOME_ORGANIZADOR']."</td>";
                        echo "<td>".$user_data['SENHA_ORGANIZADOR']."</td>";
                        echo "<td>".$user_data['EMAIL_ORGANIZADOR']."</td>";
                        echo "<td>".$user_data['TELEFONE_ORGANIZADOR']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editOrg.php?id=$user_data[ID_ORGANIZADOR]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='deleteOrg.php?id=$user_data[ID_ORGANIZADOR]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    
    </div>
    <div class="imgContainer">
        <img src="./images/Company.gif" alt="">
    </div>
</section>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
