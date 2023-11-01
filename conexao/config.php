<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pfi';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    

    //if($conexao->connect_errno){
    //    echo "Erroooooooooooooo";
    //}
    //else{
    //    echo "Deu certo";
    //}
?>