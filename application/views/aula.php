<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?=static_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=static_url('assets/css/heroic-features.css');?>" rel="stylesheet">
  <link href="<?=static_url('assets/css/theme-home.css');?>" rel="stylesheet">


  <title>BXEad</title>
  

  <!-- Bootstrap core CSS -->
  <link href="<?=static_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=static_url('css/blog-post.css');?>" rel="stylesheet">
  <script type="text/javascript" src="<?=static_url('assets/js/functions.js');?>"></script>

</head>

<body>

  <?php $this->load->view('template/nav_header' , array('redirecionar' => base_url('curso/aulas/'.$curso->id) , "nome" => $curso->nome )); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div  class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?=$aula->video->nome?></h1>

        <!-- Author -->
        <p class="lead">
          Por 
          <a href="#"><?=$autor->nome?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><?=$aula->datahora_cadastro;?></p>

        <hr>

        <!-- Preview Iframe -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?=$aula->video->url?>" allowfullscreen></iframe>
        </div>
        


        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Escreva suas Duvidas e comentarios:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" id="textarea-comentario" rows="3"></textarea>
              </div>
              <button type="button" id="comentario" onclick="addNovoComentario(<?=$aula->id;?>)" class="btn btn-primary">Comentar</button>
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

                <?php foreach ($comentario->respostas as $k => $resposta_comentario): ?>

                  <?php //print_r(($resposta_comentario)); ?>
                  <?php //print_r(($usuario)); ?>

                  <?php if($resposta_comentario->tipo === 'instrutor'): ?>
                    <div class="media mt-4">
                      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                      <div class="media-body">
                        <h5 class="mt-0"><?=$resposta_comentario->usuario->nome;?></h5>
                        <?=$resposta_comentario->resposta;?>

                        <textarea class="form-control" id="textarea-resposta-<?=$resposta_comentario->id?>" rows="1"></textarea>
                        <button type="button" id="comentario"        onclick="addRespostaComentario('#textarea-resposta-<?=$resposta_comentario->id?>' , <?=$usuario->id?> , <?=$resposta_comentario->usuario->id;?>)" class="btn btn-sm mt-1 btn-primary">Responder</button>

                      </div>
                      <?php else:?>
                        <div class="media mt-4">
                          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                          <div class="media-body">
                            <h5 class="mt-0"><?=$resposta_comentario->usuario->nome;?></h5>
                            <?=$resposta_comentario->resposta;?>

                          </div>
                        <?php endif;?>

                      </div>
                    <?php endforeach; ?>


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
  <?php $this->load->view('template/copywrite'); ?>
  

  <!-- Bootstrap core JavaScript -->
  <script src="<?=static_url('assets/jquery/jquery.min.js');?>"></script>
  <script src="<?=static_url('assets/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

</body>

</html>
