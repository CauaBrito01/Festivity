<?php
    include_once('config.php');

    if(isset($_POST['updateOrg']))
    {       
            $idOrg =  $_POST['idOrg'];
            $nomeOrg  = $_POST['nomeOrg'];
            $cnpjOrg = $_POST['cnpj'];
            $emailOrg = $_POST['email'];
            $telefoneOrg = $_POST['tel'];
            $minhasenhaOrg = $_POST['password'];

        
            $sqlUpdate = "UPDATE organizador SET NOME_ORGANIZADOR='$nomeOrg',SENHA_ORGANIZADOR='$minhasenhaOrg',EMAIL_ORGANIZADOR='$emailOrg',TELEFONE_ORGANIZADOR='$telefoneOrg',CNPJ='$$cnpjOrg'
            WHERE ID_ORGANIZADOR = '$idOrg'";

        

        $result = $conexao->query($sqlUpdate);
            

        }
        
    header('Location: gerenciarUsuariosOrg.php');

       
    
    ?>