<main role="main" class="container" >
<body>

<?php 
    $url = explode('/', $_GET['pag']);
    $aux = end($url);

    $plan = new Plano();
    
    if($aux == "ativo"){
        $countplano = $plan->selecionaCountAtivo();
        $dadosplano = $plan->selecionaAtivo();
    }
    else if($aux == "suspenso"){
        $countplano = $plan->selecionaCountSuspenso();
        $dadosplano = $plan->selecionaSuspenso();
    }
    else if($aux == "pagamentopendente"){
        $countplano = $plan->selecionaCountPagPendente();
        $dadosplano = $plan->selecionaPagPendente();
    }
    else if($aux == "cancelado"){
        $countplano = $plan->selecionaCountCancelado();
        $dadosplano = $plan->selecionaCancelado();
    }

    if($aux == "pagamentopendente"){
      $aux = "pagamento pendente";
    }

?>

<?php if(empty($dadosplano)){ ?>
            <br><br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, não existe nenhum plano com status "<?php echo ucfirst($aux)?>" atualmente.
            </div>
<?php   } 
        else{ 
?>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Relatório</h1>
    <p class="fs-4 text-muted">Planos que atualmente estão com status "<?php echo $dadosplano[0]['status']?>" (Total: <?php echo $countplano[0]['qntd'] ?>)</p>
  </div>
    <?php if($aux == "ativo" || $aux == "pagamento pendente"){ ?>
    <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Data de compra</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Plano</th>		  
        </tr>	
      <?php 
      foreach ($dadosplano as $dado){ ?>
        <tr>
          <td ><?php $data = new DateTime($dado["criacao"]); echo $data->format('d/m/Y H:i:s');?></td>
          <td ><?php echo $dado["nome_aluno"];?></td>
          <td ><?php echo $dado["email_aluno"];?></td>
          <td ><?php echo $dado["nome_plano"];?></td>
        </tr>
      <?php } }
      else if($aux == "suspenso" || $aux == "cancelado"){ 
        if($aux == "suspenso"){
          $aux2 = "suspensão";
        }
        else{
          $aux2 = "cancelamento";
        }
        ?>
          <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Data de compra</th>
          <th scope="col">Data de <?php echo $aux2 ?></th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Plano</th>		  
        </tr>	
      <?php 
      foreach ($dadosplano as $dado){ ?>
        <tr>
          <td ><?php $data = new DateTime($dado["criacao"]); echo $data->format('d/m/Y H:i:s');?></td>
          <td ><?php $data = new DateTime($dado["modificacao"]); echo $data->format('d/m/Y H:i:s');?></td>
          <td ><?php echo $dado["nome_aluno"];?></td>
          <td ><?php echo $dado["email_aluno"];?></td>
          <td ><?php echo $dado["nome_plano"];?></td>
        </tr>
      <?php } ?>
    </table>
    
<?php   } }
?>        

</body>
</main>
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>