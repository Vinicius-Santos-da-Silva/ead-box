<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?=BASE.'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=BASE.'assets/css/heroic-features.css';?>" rel="stylesheet">
  <link href="<?=BASE.'assets/css/theme-home.css';?>" rel="stylesheet">


  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=BASE.'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=BASE.'css/blog-post.css';?>" rel="stylesheet">
  <script type="text/javascript" src="<?=BASE.'assets/js/functions.js';?>"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><?=$curso?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div  class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?=$aula->video->nome?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Vinicius</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Preview Iframe -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?=$aula->video->url?>" allowfullscreen></iframe>
        </div>
        


        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" id="textarea-comentario" rows="3"></textarea>
              </div>
              <button type="button" id="comentario" onclick="addNovoComentario(<?=$aula->id;?>)" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <div id="comentarios">
          
          <?php foreach ($comentarios as $key => $comentario): ?>

            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0"><?=$comentario->usuario->nome;?></h5>
                <?=$comentario->duvida;?>
              </div>
            </div>

          <?php endforeach; ?>

        </div>

        <!-- Single Comment -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div> -->

        <!-- Comment with nested comments -->


      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=BASE.'assets/jquery/jquery.min.js';?>"></script>
  <script src="<?=BASE.'assets/bootstrap/js/bootstrap.bundle.min.js';?>"></script>

</body>

</html>
