<?php

    //define o host como local
    $dbHost = 'localhost';
    //define o username
    $dbUsername = 'root';
    $dbPassword = "";
    //pega o nome do bd criado
    $dbName = 'festivity2';

    //cria a variavel de conexão
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    /*
        if ($conexao -> connect_errno)
        {
            echo "ERRO";
        }

        else
        {
            echo "CONEXÃO FEITA";
        }
    */

?>