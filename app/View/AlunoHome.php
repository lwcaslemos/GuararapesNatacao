<?php
    $p = new Plano();
    $pag = new Pagamento();

    $planoatual = $p->selecionaPlanoComprado($_SESSION['id']);

    if(!empty($planoatual)){
      $ultimopag = $pag->selecionaUltimoPagamento($planoatual[0]["id"]);
    }
?>

<body>  
<br><br>
<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Bem vindo, <?php echo $_SESSION['nome']?>!</h1>
    <p class="fs-4 text-muted">Veja os detalhes do seu plano atual.</p>
  </div>

<br><br>

<main class="container">

<?php 
    if(empty($planoatual)){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['nome'] ?></strong>, você nunca contratou um plano ou todos os seus planos contratados foram cancelados. <a href="http://localhost/guararapesnatacao/aluno/assine">Assine!</a>
            </div>
  <?php   }
  else{
  ?>  

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">#<?php echo lcfirst($planoatual[0]["nome_plano"]) ?></strong>
          <h3 class="mb-0">Plano <?php echo lcfirst($planoatual[0]["nome_plano"]) ?></h3>
          <div class="mb-1 text-muted">Contratado no dia <?php $data = new DateTime($planoatual[0]["criacao"]); echo $data->format('d/m/Y'); ?></div>
          <p class="card-text mb-auto"><b>Status:</b> <?php echo $planoatual[0]["status"] ?></p>
          <br>

          <a href="http://localhost/guararapesnatacao/aluno/cancelaPlano" data-toggle="modal" data-target="#exampleModal">Cancelar plano</a>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Você realmente deseja cancelar seu plano?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div class="file-loading">
          <form action="http://localhost/guararapesnatacao/aluno/cancelaPlano" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php 
              if($planoatual[0]["status"] == "Ativo"){
                $data = new DateTime($planoatual[0]["fim_ciclo"]);
                $texto = 'O status atual do seu plano é ativo com direito a uso até o dia '.$data->format('d/m/Y').'. Caso siga com o cancelamento nesse momento, você perderá o direito ao uso.'; 
              }
              else{
                $texto = 'O status atual do seu plano é '.lcfirst($planoatual[0]["status"]).'.';
              }
            ?>
              <?php echo $texto?>
            </div> 

          <div class="col-md-4 order-md-1">
            <input type="hidden" name='id_alt' value="<?php echo $planoatual[0]["id"];?>"> 

				  </div>
          </div>
				  <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Cancelar</button>
				  </div>
				</div>
			  </div>
      </form>
			</div>
			</div>

        </div>
        <div class="col-auto d-none d-lg-block">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">#<?php echo lcfirst($planoatual[0]["nome_plano"]) ?></strong>
          <h3 class="mb-0">Pagamento</h3>
          <?php if(empty($ultimopag)){ ?>
            <div class="mb-1 text-muted">Você nunca realizou pagamento para esse plano. Para ativa-lo, favor realizar o pagamento.</div>            
          <?php } 
          else {
          ?>
          <div class="mb-1 text-muted">Último pagamento: <?php echo 'R$'.number_format((float)$ultimopag[0]["valor"], 2, ',', '');?> em <?php $data = new DateTime($ultimopag[0]["criacao"]); echo $data->format('d/m/Y'); ?></div>
          <p class="mb-auto">Próximo pagamento: <?php echo 'R$'.number_format((float)$planoatual[0]["valor"], 2, ',', '');?> em <?php $data = new DateTime($planoatual[0]["fim_ciclo"]); echo $data->format('d/m/Y'); ?></p>
          <?php } ?>
          <br>
          <a href="http://localhost/guararapesnatacao/aluno/pagamentos" class="stretched-link">Mais detalhes</a>
        </div>
        <div class="col-auto d-none d-lg-block">
         
        </div>
      </div>
    </div>
  </div>
  
  </div><!-- /.row -->

</main><!-- /.container -->
<?php } ?>
</body>

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>