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
  <link href="<?=BASE.'assets/css/heroic-features.css';?>" rel="stylesheet">
  <link href="<?=BASE.'assets/css/theme-home.css';?>" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
 <?php $this->load->view('template/nav_header' , array('redirecionar' => base_url('') , "nome" => "BXEad" )); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row text-center mt-3">

      <?php foreach ($cursos as $curso) :?>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <img class="card-img-top" height="120" src="<?=$curso->imagem;?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?=$curso->nome;?></h4>
            <p class="card-text">R$ <?=$curso->preco->preco;?></p>
          </div>
          <div class="card-footer">
            <a href="<?=BASE.'curso/comprar/'.$curso->id?>" class="btn btn-primary">Comprar Curso</a>
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
