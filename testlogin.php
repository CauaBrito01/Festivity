<?php
    //inicia a sessão
    session_start();

    //print_r($_REQUEST)

    //confere se receu alguma coisa do submit e se os campos email e senha não estao vazios 
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {

        //faz referencia ao config
        include_once('config.php');
        
        //cira variaveis e as preenche com os valores dos inputs
        $email =$_POST['email'];
        $minhasenha =$_POST['password'];

        //verifica se os oarametros existem no bd
        $sql = "SELECT * FROM cliente WHERE Email = '$email' and Senha = '$minhasenha'";
        
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
?>

