<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {       
            $id =  $_POST['id'];
            $nome  = $_POST['text'];
            $dataNasc = $_POST['data'];
            $email = $_POST['email'];
            $telefone = $_POST['tel'];
            $minhasenha = $_POST['password'];


        $sqlUpdate = "UPDATE cliente SET Nome='$nome',Senha='$minhasenha',Email='$email',Data_nascimento='$dataNasc',Telefone='$telefone'
        WHERE Id_cliente = '$id'";

        $result = $conexao->query($sqlUpdate);
            

        }

    header('Location: gerenciarUsuarios.php');

       
    
    ?>