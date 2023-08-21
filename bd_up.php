<?php

$bd = new SQLite3("filmes.db");

$sql = "DROP TABLE IF EXISTS filmes";

if ($bd->exec($sql))
    echo "\ntabela filmes apagada\n";

$sql = "CREATE TABLE filmes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titulo VARCHAR(200) NOT NULL,
        poster VARCHAR (200),
        sinopse TEXT,
        nota DECIMAL(2,1)
    )";

if ($bd->exec($sql))
    echo "\ntabela filmes criada com sucesso\n";
else
    echo "\nerro ao criar tabela filmes\n";

$sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VAlUES (
        0,
        'Os Vingadores',
        'https://www.themoviedb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg',
        'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
        9.9
    )"; 

if ($bd->exec($sql))
    echo "\nfilme inserido com sucesso\n";
else
    echo "\nerro ao inserir filmes\n";

    $sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VAlUES (
        1,
        'Ad Astra',
        'https://www.themoviedb.org/t/p/w300/wigZBAmNrIhxp2FNGOROUAeHvdh.jpg',
        'Roy McBride é um engenheiro espacial, portador de um leve grau de autismo, que decide empreender a maior jornada de sua vida: viajar para o espaço, cruzar a galáxia e tentar descobrir o que aconteceu com seu pai, um astronauta que se perdeu há vinte anos atrás no caminho para Netuno.',
        8.8
    )"; 

if ($bd->exec($sql))
    echo "\nfilme inserido com sucesso\n";
else
    echo "\nerro ao inserir filmes\n";


?>