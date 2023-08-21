<?php

    $titulo = $_POST("titulo");
    $sinopse = $_POST("sinopse");
    $nota = $_POST("nota");
    $poster = $_POST("poster");

    $bd = new SQLite3("filmes.db");

    $sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VAlUES (
        '$titulo',
        '$poster',
        '$sinopse',
         $nota
    )"; 

    if ($bd->exec($sql))
        echo "\nfilme inserido com sucesso\n";
    else
        echo "\nerro ao inserir filmes\n";

?>