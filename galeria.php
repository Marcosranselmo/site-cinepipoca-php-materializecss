<?php include "cabecalho.php" ?>

<?php

$bd = new SQLite3("filmes.db");
$sql = "SELECT * FROM filmes";
$filmes = $bd->query($sql);

// $filme1 = [
//     "titulo" => "vingadores",
//     "nota" => "9,7",
//     "sinopse" => "I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
//     "poster" => "https://www.themoviedb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg"
// ];

// $filme2 = [
//     "titulo" => "Ad Astra",
//     "nota" => "8,7",
//     "sinopse" => "Roy McBride é um engenheiro espacial, portador de um leve grau de autismo, que decide empreender a maior jornada de sua vida: viajar para o espaço, cruzar a galáxia e tentar descobrir o que aconteceu com seu pai, um astronauta que se perdeu há vinte anos atrás no caminho para Netuno.",
//     "poster" => "https://www.themoviedb.org/t/p/w300/wigZBAmNrIhxp2FNGOROUAeHvdh.jpg"
// ];

// $filme3 = [
//     "titulo" => "A Grande Comédia",
//     "nota" => "7,9",
//     "sinopse" => "Kevin Bacon estrela esta comédia no papel de Nick Chapman, um jovem e promissor ator que acaba de chegar a Hollywood. Para alcançar o sucesso, ele tentará agradar a todos que puderem lhe ajudar a realizar seus sonhos de luxo e da fama. Mas o sabor do fracasso lhe ensinará uma dura lição.",
//     "poster" => "https://www.themoviedb.org/t/p/w300/70273ysWBavPybak9teRNEDqDKz.jpg"
// ];

// $filme4 = [
//     "titulo" => "As Aventuras de TIMTIM",
//     "nota" => "8,5",
//     "sinopse" => "As Aventuras de Tintim é uma série franco-belga criada por Hergé adaptando para TV os livros da série. Estreou em 1991 e teve 39 episódios divididos em três temporadas.",
//     "poster" => "https://www.themoviedb.org/t/p/w300/umlovDiFIbnR0mkFsDzmiHoxVOH.jpg"
// ];

// $filmes = [$filme1, $filme2, $filme3, $filme4];

?>

<body>
    <nav class="nav-extended blue lighten-3">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>CINEPIPOCA</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent #2196f3 blue">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#test2">Assistidos</a></li>
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="div row">
            <?php while ($filme = $filmes->fetchArray()) : ?>
                    <div class="col s12 m6 l3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img src="<?= $filme["poster"] ?>">
                                <a class="btn-floating halfway-fab waves-effect waves-light red">
                                    <i class="material-icons">favorite_border</i></a>
                            </div>
                            <div class="card-content">
                                <p class="valign-wrapper">
                                    <i class="material-icons amber-text">star</i> <?= $filme["nota"] ?>
                                </p>
                                <span class="card-title"><?= $filme["titulo"] ?></span>
                                <p><?= $filme["sinopse"] ?></p>
                            </div>
                        </div>
                    </div>
            <?php endwhile ?>
        </div>
    </div>
</body>

</html>