<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BXEad</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=BASE.'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=BASE.'css/blog-post.css';?>" rel="stylesheet">

</head>

<body>

  <?php $this->load->view('template/nav_header' , array('redirecionar' => base_url('') , "nome" => $curso->nome )); ?>

  <!-- Page Content -->
  <div class="container pt-3">

    <!-- Heading Row -->
    <!-- <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="http://placehold.it/900x400" alt="">
      </div>
      <div class="col-lg-5">
        <h1 class="font-weight-light">Business Name or Tagline</h1>
        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        <a class="btn btn-primary" href="#">Call to Action!</a>
      </div>
    </div> -->
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">Atenção! Este é apenas um sistema de apresentação de meu trabalho.</p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">

      <?php foreach ($aulas as $key => $aula) : ?>
        <div class="col-md-4 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"><?=$aula->video->nome?></h2>
              <p class="card-text"><?=$aula->video->descricao;?></p>
            </div>
            <div class="card-footer">
              <a href="<?=BASE.'aula/visualizar/'.$aula->id;?>" class="btn btn-primary btn-sm">More Info</a>
            </div>
          </div>
        </div>
      <?php endforeach;?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php $this->load->view('template/copywrite'); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="<?BASE.'assets/jquery/jquery.min.js';?>"></script>
  <script src="<?=BASE.'assets/bootstrap/js/bootstrap.bundle.min.js';?>"></script>

</body>

</html>