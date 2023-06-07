<?php
     if(!empty($_GET['id']))
     {   
         //faz referencia ao config
         include_once('config.php');
 
         $id = $_GET['id'];
 
         $sqlSelect = "SELECT * FROM evento WHERE ID_EVENTO= $id";
 
         $result = $conexao->query($sqlSelect);
 
         if($result->num_rows > 0){
 
            $sqlDelete = "DELETE FROM evento WHERE ID_EVENTO= $id";

            $resultDelete = $conexao->query($sqlDelete);

         }
        }

        header('Location: MeusEventos.php');
?>