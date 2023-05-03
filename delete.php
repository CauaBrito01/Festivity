<?php
     if(!empty($_GET['id']))
     {   
         //faz referencia ao config
         include_once('config.php');
 
         $id = $_GET['id'];
 
         $sqlSelect = "SELECT * FROM cliente WHERE Id_cliente = $id";
 
         $result = $conexao->query($sqlSelect);
 
         if($result->num_rows > 0){
 
            $sqlDelete = "DELETE FROM cliente WHERE Id_cliente =$id";
            $resultDelete = $conexao->query($sqlDelete);
 
         }
        }

        header('Location: gerenciarUsuarios.php');
?>