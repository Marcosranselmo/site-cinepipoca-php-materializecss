<?php
// CONEXÃO COM O BANCO DE DADOS CINEPIPOCA
$host = "localhost";
$user = "admin";
$pass = "admin";
$base = "db_cinepipoca";

// FAzENDO A CONEXÃO COM O BANCO DE DADOS
$con_cinepipoca = mysqli_connect($host, $user, $pass);
$banco = mysqli_select_db($con_cinepipoca, $base);

// MENSAGEM DE FALHA DE CONEXÃO
if(mysqli_connect_errno()) {
    die("Falha na conexão com o bando de dados: ".
        mysqli_connect_error() . " ( " . mysqli_connect_errno() . " )"
    );
}
	
$sql = "CREATE TABLE filmes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    poster VARCHAR (200),
    sinopse TEXT,
    nota DECIMAL(2,1)
    )
";

if ($bd->exec($sql))
    echo "\ntabela filmes criada\n";
else
    echo "\nerro ao criar tabela filmes\n"; 

$sql = "INSERT INTO filmes (id, titulo, poster, sinopse, nota) VALUES (
        0,
    )";

$filme1 = [
    "titulo" => "vingadores",
    "nota" => "9,7",
    "sinopse" => "I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
    "poster" => "https://www.themoviedb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg"
];

?>