<?php include "cabecalho.php" ?>

<?php
session_start();
require "./util/Mensagem.php";

$controller = new FilmesController();
$filmes = $controller->index();
?>

<body>

  <!-- Menu responsive -->
  <nav class="brown">
    <div class="container black">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/">Galeria</a></li>
          <li><a href="/novo">Cadastrar filmes</a></li>
          <li><a href="collapsible.html">Minha conta</a></li>
          <li><a href="mobile.html">Entrar</a></li>
        </ul>
      </div>
      <ul class="sidenav" id="mobile-demo">
        <li><a href="/">Galeria</a></li>
        <li><a href="/novo">Cadastrar filmes</a></li>
        <li><a href="collapsible.html">Minha conta</a></li>
        <li><a href="mobile.html">Entrar</a></li>
      </ul>
    </div>
  </nav> 

  <!-- Slider -->
  <div class="container">
    <div class="carousel carousel-slider">
      <a class="carousel-item" href="#one!"><img src="../imagens/slider/slider01.jpg"></a>
      <a class="carousel-item" href="#two!"><img src="../imagens/slider/slider02.jpg"></a>
      <a class="carousel-item" href="#three!"><img src="../imagens/slider/slider03.jpg"></a>
      <a class="carousel-item" href="#four!"><img src="../imagens/slider/slider04.jpg"></a>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <?php if (!$filmes) echo "<p class='card-panel red lighten-4'>Nenhum filme cadastrado</p>" ?>

      <?php foreach ($filmes as $filme) : ?>
        <div class="col s12 m6 l3">
          <div class="card hoverable card-serie">
            <div class="card-image">
              <img src="<?= $filme->poster ?>" class="activator" />
              <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $filme->id ?>">
                <i class="material-icons"><?= ($filme->favorito) ? "favorite" : "favorite_border" ?></i>
              </button>
            </div>
            <div class="card-content">
              <p class="valign-wrapper">
                <i class="material-icons amber-text">star</i> <?= $filme->nota ?>
              </p>
              <span class="card-title activator truncate">
                <?= $filme->titulo ?>
              </span>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><?= $filme->titulo ?><i class="material-icons right">close</i></span>
              <p><?= substr($filme->sinopse, 0, 500) . "..." ?></p>
              <button class="waves-effect waves-light btn-small right red accent-2 btn-delete" data-id="<?= $filme->id ?>"><i class="material-icons">delete</i></button>

            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>

  </div>

  <script>
  $(document).ready(function() {
    
  $('.carousel.carousel-slider').carousel({
    fullWidth: true});
  });
  </script>

  <?= Mensagem::mostrar(); ?>

  <script>
    $(document).ready(function() {
      $('.sidenav').sidenav();
    })
  </script>

  <!-- Favoritar -->
  <script>
    document.querySelectorAll(".btn-fav").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        fetch(`/favoritar/${id}`)
          .then(response => response.json())
          .then(response => {
            if (response.success === "ok") {
              if (btn.querySelector("i").innerHTML === "favorite") {
                btn.querySelector("i").innerHTML = "favorite_border"
              } else {
                btn.querySelector("i").innerHTML = "favorite"
              }
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao favoritar'
            })
          })
      });
    });

    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        const requestConfig = {
          method: "DELETE",
          headers: new Headers()
        }
        fetch(`/filmes/${id}`, requestConfig)
          .then(response => response.json())
          .then(response => {
            if (response.success === "ok") {
              const card = btn.closest(".col")
              card.classList.add("fadeOut")
              setTimeout(() => card.remove(), 1000)
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao favoritar'
            })
          })
      });
    });
  </script>

</body>

</html>