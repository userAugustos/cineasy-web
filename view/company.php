<?php session_start();
 // if (!$_SESSION['company_log']) {
 //   header('Location: ../index.php');
 //   exit();
 // }
 $_SESSION['company_name'] = 'CineDev';
?>
<html lang="pt-br">
<head>
  <title><?=$_SESSION['company_name']?></title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css">

  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <link href="../node_modules/aos/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/company-style.css">

  <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
  <?php include '../controller/get.php'?>
</head>
<body>
<?php
  $get = new GetMetods();

  $get->getMovie('/listaemalta/', 4);
?>
  <header>
      <div id="carousel-company" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view">
            <img class="d-block w-100" src="../assets/poublicacoes.png"
              alt="First slide">
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption carousel-text-one">
            <h3 class="h3-responsive">Crie suas publicações e coloque seus filmes em estreia</h3>
            <strong>Aqui você tem acesso todas as possibilidades do Cineasy</strong>
          </div>
        </div>
        <div class="carousel-item">
          <div class="view">
            <img class="d-block w-100" src="../assets/analise.png"
              alt="Second slide">
            <div class="mask rgba-black-strong"></div>
          </div>
          <div class="carousel-caption carousel-text-two">
            <h3 class="h3-responsive">Acesse suas publicações e veja o feedback dos assinantes</h3>
            <strong>Analise o alcance das suas publicações</strong>
          </div>
          <!-- <div class="carousel-caption carousel-button">
          </div> -->
        </div>
        <div class="carousel-caption carousel-button">
          <button type="button" name="pubMovie" id="pubMovie">Publicar Filme</button>
          <button type="button" name="pubPost" id="pubPost">Fazer publicações</button>
          <button type="button" name="showPost" id="showPost">Ver suas publicações</button>
          <button type="button" name="showMovies" id="showMovies">Ver seus filmes</button>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-company" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-company" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <main data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
      data-aos-duration="500" data-aos-id="main">
    <!-- cadastro de filmes -->
    <div class="container-fluid show cadMovie">
      <div class="postForm">
        <!--Upload de filme-->
      <div class="formMovie">
        <form class="text-center border border-light p-5" action="#!" method="post">
          <p class="h4 mb-4">Vamos Lançar esse Filme!!</p>
          <div class="form-row mb-4">
              <div class="col">
                  <!-- Nome do filme -->
                  <label for="movieName">Nome do Filme</label>
                  <input type="text" id="movieName" class="form-control" name="movieName" placeholder="ex: Anaconda e elas " onchange="previewCard()">
              </div>
              <div class="col">
                  <!-- nome do Diretor -->
                  <label for="directorName">Diretor</label>
                  <input type="text" id="directorName" class="form-control" name="directorName" placeholder="ex: João Pindoia">
              </div>
          </div>
          <div class="form-row mb-4">
            <div class="col">
              <label for="origem">Pais de origem</label>
              <input type="text" name="origem" id="origem" class="form-control">
            </div>
            <div class="col">
              <label for="dataEstreia">Data de Estreia</label>
              <input type="date" id="dataEstreia" class="form-control" name="dataEstreta">
            </div>
          </div>
          <div class="form-row mb-4">
            <div class="col">
              <label for="classificacao">Classificação indicativa</label>
              <input type="number" name="classificacao" id="classificacao" class="form-control">
              <small class="form-text text-muted mb-4">apenas a idade</small>
            </div>
            <div class="col">
              <label for="destribuidora">Destribuidora</label>
              <input type="text" id="destribuidora" class="form-control" name="destribuidora">
            </div>
          </div>
          <!-- Id filme -->
          <label for="movieTrailer" style="margin-left: -70%; margin-top: -40px;">Id do trailer</label>
          <input type="url" id="movieTrailer" class="form-control mb-4" name="movieTrailer" placeholder="clique no '?' para saber como pegar o ID no youtube">
          <!-- Tempo de fime & imagem-->
          <div class="form-row mb-4">
            <div class="col">
              <label for="movieTime">Tempo de duração</label>
              <input type="number" id="movieTime" class="form-control" name="movieTime" aria-describedby="minTime">
              <small id="minTime" class="form-text text-muted mb-4">
                  em minutos ex: 160min
              </small>
            </div>
            <div class="col">
              <label for="movieGenero" style="margin-left: -10%;">Genero</label>
              <input type="text" id="movieGenero" name="movieGenero" class="form-control" onchange="previewCard()">
            </div>
          </div>
          <div class="d-flex" style="margin: -25px auto 0 auto">
            <label for="" style="margin: auto 5px">Poster</label>
            <input type="file" class="form-control-file" id="moviePoster" onchange="previewFile()" name="moviePoster">
          </div>
          <div class="d-flex" style="margin: 10px 0">
            <label for="" style="margin: auto 5px">Banner</label>
            <input type="file" class="form-control-file" id="movieBanner" name="movieBanner">
          </div>
          <!-- Sinopse -->
          <label for="movieSinopse" style="margin-left: -80%;">Sinopse</label>
          <textarea class="form-control" rows="4" cols="50" id="movieSinopse" name="movieSinopse" style="resize:none;"></textarea>
          <!-- register movie up button -->
          <button class="btn btn-warning my-4 btn-block" type="submit">Anunciar Filme</button>
          <hr>
          <!-- Helper -->
          <p>Alguma duvida?
              <a href="" target="_blank">como fazer meu upload</a>
        </form>
      </div>
      </div>

      <div class="preview">
        <h4>Como Está ficando?</h4>
        <div class="col-sm-12 col-md-7">
          <div class="card" id="card-movie">
            <div class="card-header">
              <strong>Titulo</strong>
            </div>
            <div class="card-img-overlay">
              <a href="" class="btn btn-info" id="category">Categoria</a>
            </div>
            <img class="card-img" src="../1585614116047-ailhadafantasia.jpg" alt="Imagem do card">
            <div class="card-body d-flex">
              <span id="likes">
                <a href="#">
                  <i class="fas fa-thumbs-up" style="color: blue;">
                  </i>
                  0
                </a>
              </span>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#filme"> Ver mais </button>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- cadastro de publicações -->
    <div class="container-fluid hide cadPost">
      <div class="postForm">
        <form class="text-center border border-light p-5" action="#!" method="post">
          <p class="h4 mb-4" style="margin: -20px 0 0 0">Cire publicações para engajar sua comunidade</p>
          <div class="form-row mb-4">
              <div class="col d-block">
                  <!-- Texto da publicação -->
                  <label for="movieName" style="margin: 0 15px 0 -22rem">Texto da publicação</label><br>
                  <textarea name="name" rows="3" cols="50" style="resize:none;" ></textarea>
              </div>
          </div>
          <div class="" style="margin: 25px auto 0 auto">
            <label for="post-image" style="margin: 0 10px 0 -20rem">Imagem da publicação</label>
            <input type="file" class="form-control-file" id="post-image" onchange="" name="post-iamge">
          </div>
        </form>
      </div>

      <div class="preview-publicacao">
        <div class="title">
          <img src="../assets/avatar.svg" alt="" id="icon">
          <strong class="">...</strong>
        </div>
        <div class="image-view">
          <img src="../assets/mulan-banner.jpg" alt="">
        </div>
        <div class="content">
          <div><i class="fas fa-thumbs-up" style="color: #f2dd3d;"></i><small style="color: #fff;">Curtidas</small></div>
          <div><i class="fas fa-comment" style="color:#f2dd3d"></i><small style="color: #fff;">Comentarios</small></div>
          <div><small style="color: #fff;">0</small><small style="color: #fff;">vizualizações</small></div>
        </div>
      </div>
    </div>
      <!-- ver publicações -->
    <div class="container-fluid hide showPosts">

    </div>

    <div class="container-fluid hide showMovies">
      <section class="filmes row align-items-center">
        <?php foreach ($get->movieObject as $key => $movie): ?>
          <div class="col-md-3 col-sm-12">
            <div class="card" id="card-movie">
              <div class="card-header">
                <strong><?=$movie->nome?></strong>
              </div>
              <div class="card-img-overlay">
                <a href="" class="btn btn-info" id="category"><?=$movie->genero ?></a>
              </div>
              <img class="card-img" alt="Imagem do card" src=<?=$movie->foto?> >
              <div class="card-body d-flex">
                <span id="likes">
                  <a href="#">
                    <i class="fas fa-thumbs-up"></i>
                  </a>
                </span>
                <button type="button" onclick="insertMovie(<?=$movie->id_films?>)" class="btn btn-outline-danger" data-toggle="modal" data-target="<?='#movie'.$movie->id_films?>">
                  Ver mais</button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </section>
    </div>
  </main>
  <!-- modal -->
  <?php foreach ($get->movieObject as $key => $movie): ?>

  <div class="modal fade movie<?=$movie->id_films?>" id="<?='movie'.$movie->id_films?>" tabindex="-1" role="dialog" aria-labelledby="Modalmovie" aria-hidden="true">
    <div class="modal-dialog" role="document">
      </div>
  </div>

<?php endforeach; ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>

  <script src="../node_modules/aos/dist/aos.js" ></script>
  <script>
    var id = <?=$movie->id_films?>;
    AOS.init();
  </script>
  <!-- Custom JS -->
  <script src="../js/company.js"></script>
</body>
</html>