<main role="main" class="container" >
<body>

<?php 
    $msg = new Mensagem();
    $mensagem = $msg->selecionaMensagens($_SESSION['id']);
?>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Suas mensagens</h1>
  </div>

	<form action="http://localhost/guararapesnatacao/aluno/enviaMensagemAluno" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-3 order-md-1">
        <br><label for="visual">Nome:</label>
		<input type="text" name="visual" id="visual" disabled="disabled" class="form-control" value="<?php echo $_SESSION['nome'] ?>"><br>
	  </div>
      </div>
      <div class="row">
        <div class="col-md-6 order-md-1">
        <label for="texto">Mensagem: </label>
          <textarea name="texto" rows="4" cols="40" maxlength="250" class="form-control" required></textarea><br>
             <div class="invalid-feedback">
                O preenchimento do campo "Mensagem" é obrigatório
             </div>
        </div>
      </div>
      </div>

      <div class="row">
        <div class="col-md-2 order-md-1">
          <button class="btn btn-primary btn-sm btn-block" type="submit">Enviar</button>
        </div>
      </div> 
  </form>
  <br><br><br>
  <?php 
    if(empty($mensagem)){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, você não enviou nenhuma mensagem até o momento.
            </div>
<?php   }  
    else{ ?>
  <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Data/hora do envio</th>
          <th scope="col">Nome</th>		  
          <th scope="col">Mensagem</th>		  
        </tr>	
      <?php 
      foreach ($mensagem as $dado){ ?>
        <tr>
          <td ><?php $data = new DateTime($dado["criacao"]); echo $data->format('d/m/Y H:i:s');?></td>
          <td ><?php if($dado["autor"] == 'Aluno'){echo $_SESSION['nome'];} else{echo $dado["autor"];}?></td>
          <td ><?php echo $dado["texto"];?></td>
    <?php } } ?>
</body>
</main>
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>