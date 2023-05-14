<?php
    //inicia a sessão
    session_start();

    //print_r($_REQUEST)

    if (isset($_POST['email']))
    {

        //confere se receu alguma coisa do submit e se os campos email e senha não estao vazios 
        if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))

        {

            //faz referencia ao config
            include_once('config.php');
            $minhasenha = MD5($_POST['password']);

            //cira variaveis e as preenche com os valores dos inputs
            $email =$_POST['email'];
            $minhasenha = MD5($_POST['password']);

            //verifica se os oarametros existem no bd
            $sql = "SELECT * FROM cliente WHERE EMAIL_CLIENTE = '$email' and SENHA_CLIENTE = '$minhasenha'";
            
            //chama a conexão q foi definida em config e realiza a query
            $result = $conexao->query($sql);

            //verifica se os numero de linhas encontradas no bd com o email e a senha é exstente ou não
            if(mysqli_num_rows($result) < 1)
            {
                header('Location: telaLogin.php');
                //se não existir ele da unset e some com os dados
                unset($_SESSION['email']);
                unset($_SESSION['password']);
            }
            else
            {   
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $minhasenha;
                header('Location: Home.php');
            }

        }
        //se não recebeu retorna ao login
        else{
            header('Location: telaLogin.php');
        }

    }

    else{
        //confere se receu alguma coisa do submit e se os campos email e senha não estao vazios 
        if(isset($_POST['submit']) && !empty($_POST['emailOrganizador']) && !empty($_POST['senhaOrganizador']))
        {

            //faz referencia ao config
            include_once('config.php');
            $minhasenha = MD5($_POST['senhaOrganizador']);

            //cira variaveis e as preenche com os valores dos inputs
            $emailOrganizador =$_POST['emailOrganizador'];
            $minhasenha = MD5($_POST['senhaOrganizador']);

            //verifica se os oarametros existem no bd
            $sql = "SELECT * FROM organizador WHERE EMAIL_ORGANIZADOR = '$emailOrganizador' and SENHA_ORGANIZADOR = '$minhasenha'";
            
            //chama a conexão q foi definida em config e realiza a query
            $result = $conexao->query($sql);

            
            print_r($result);


            //verifica se os numero de linhas encontradas no bd com o email e a senha é exstente ou não
            if(mysqli_num_rows($result) < 1)
            {
                header('Location: telaLogin.php');
                //se não existir ele da unset e some com os dados
                unset($_SESSION['emailOrganizador']);
                unset($_SESSION['senhaOrganizador']);
            }
            else
            {   
                $_SESSION['emailOrganizador'] = $emailOrganizador;
                $_SESSION['senhaOrganizador'] = $minhasenha;
                header('Location: MeusEventos.php');
            }

        }
        //se não recebeu retorna ao login
        else{
            header('Location: telaLogin.php');
        }
    }

    
?>

