<?php
    include_once('config.php');

    if(isset($_POST['updateEve']))
    {       
           
            $idEve = $_POST['idEve'];
            $nomePagina = $_POST['nomeEvento'];
            $descEvento = $_POST['descEvento'];
            $enderecoEvento = $_POST['endereco'];
            $dataEHorario = $_POST['dataEhora'];
            $valor = $_POST['valor'];
            $faixaEtaria = $_POST['faixaEtaria'];


        
            $sqlUpdate = "UPDATE evento SET NOME_EVENTO='$nomePagina',DESCRICAO_EVENTO='$descEvento',ENDERECO='$enderecoEvento',DATA_EVENTO='$dataEHorario',VALOR_INGRESSO='$valor',FAIXA_ETARIA='$faixaEtaria'
            WHERE ID_EVENTO = '$idEve'";

        

        $result = $conexao->query($sqlUpdate);
            

        }
        
    header('Location: MeusEventos.php');

       
    
    ?>