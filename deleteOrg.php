<?php
     if(!empty($_GET['id']))
     {   
         //faz referencia ao config
         include_once('config.php');
 
         $id = $_GET['id'];
 
         $sqlSelect = "SELECT * FROM organizador WHERE ID_ORGANIZADOR = $id";
 
         $result = $conexao->query($sqlSelect);
 
         if($result->num_rows > 0){
 
            $sqlDelete = "DELETE FROM organizador WHERE ID_ORGANIZADOR = $id";
            $resultDelete = $conexao->query($sqlDelete);
 
         }
        }

        header('Location: gerenciarUsuariosOrg.php');
?>