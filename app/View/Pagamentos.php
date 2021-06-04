<main role="main" class="container" >
<body>

<?php 
    $pag = new Pagamento();
    $plan = new Plano();
        
    $planoatual = $plan->selecionaPlanoComprado($_SESSION['id']);

    if(!empty($planoatual)){
        $pagamentos = $pag->selecionaPagamentosPlano($planoatual[0]['id']);
    }
?>

<?php if(empty($planoatual)){ ?>
    <br><br>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, você ainda não contratou nenhum plano. <a href="http://localhost/guararapesnatacao/aluno/assine">Assine!</a>
    </div>  
<?php } 
    else if(!empty($planoatual)){ 
        if(empty($pagamentos)){ ?>
            <br><br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, não localizamos nenhum pagamento referente ao seu plano atual.
            </div>
<?php   } 
        else{ 
?>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Seus pagamentos</h1>
    <p class="fs-4 text-muted">Pagamentos referentes ao seu plano atual (Plano <?php echo lcfirst($pagamentos[0]["nome_plano"])?>) </p>
  </div>

    <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Plano</th>
          <th scope="col">Data do pagamento</th>
          <th scope="col">Forma de pagamento</th>
          <th scope="col">Valor</th>
          <th scope="col">Parcela(s)</th>		  
        </tr>	
      <?php 
      foreach ($pagamentos as $dado){ ?>
        <tr>
          <td ><?php echo $dado["nome_plano"];?></td>
          <td ><?php $data = new DateTime($dado["criacao"]); echo $data->format('d/m/Y');?></td>
          <td ><?php echo $dado["forma_pagamento"];?></td>
          <td ><?php echo 'R$'.number_format((float)$dado["valor"], 2, ',', '');?></td>
          <td ><?php echo $dado["parcela"].'x';?></td>
        </tr>
      <?php } ?>
    </table>
    
<?php   }
    }
?>        

</body>
</main>
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>