<body>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Nossos planos</h1>
    <p class="fs-4 text-muted">Temos diversos planos pensados especialmente para você. Escolha o seu!</p>
  </div>

  <?php 
    $p = new Plano();
    $dados = $p->selecionaTodos();
  ?>

  <main>
    <div class="row row-cols-5 row-cols-md-3 mb-3 text-center">
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal"><?php echo $dados[0]['nome'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$<?php echo $dados[0]['valor_mensalidade'] ?><small class="text-muted fw-light">/mês</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Aulas diárias</li>
              <li>Agendamento de aulas</li>
              <li>Pagamentos de R$<?php echo $dados[0]['periodicidade']*$dados[0]['valor_mensalidade']?> a cada mês</li>
              <li>À vista ou no cartão</li>
            </ul>  
            <!-- Button trigger modal -->
			<button type="button" class="w-100 btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModal1">Assine</button>
			 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel1">Você realmente deseja assinar o plano <?php echo lcfirst($dados[0]['nome']) ?>?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                   <div class="row">
                   <div class="col-md-4 mb-3">
                   Escolha seu turno de preferência:
                   </div>
                   <div class="col-md-4 mb-3">
                   <form action="http://localhost/guararapesnatacao/aluno/assinar/<?php echo $dados[0]['id']?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                   <select class="custom-select d-block w-100" id="turno" name="turno" required>
						          <option value="Manhã">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                   </select>
                  </div>
                  </div>
                  </div>
                   <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Sim, quero assinar</button>
                    </form>
                   </div>
                 </div>
               </div>
             </div>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal"><?php echo $dados[1]['nome'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$<?php echo $dados[1]['valor_mensalidade'] ?><small class="text-muted fw-light">/mês</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Aulas diárias</li>
              <li>Agendamento de aulas</li>
              <li>Pagamentos de R$<?php echo $dados[1]['periodicidade']*$dados[1]['valor_mensalidade']?> a cada <?php echo $dados[1]['periodicidade']?> meses</li>
              <li>À vista ou no cartão</li>
            </ul>
            <!-- Button trigger modal -->
			<button type="button" class="w-100 btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModal2">Assine</button>
			 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel2">Você realmente deseja assinar o plano <?php echo lcfirst($dados[1]['nome']) ?>?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                   <div class="row">
                   <div class="col-md-4 mb-3">
                   Escolha seu turno de preferência:
                   </div>
                   <div class="col-md-4 mb-3">
                   <form action="http://localhost/guararapesnatacao/aluno/assinar/<?php echo $dados[1]['id']?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                   <select class="custom-select d-block w-100" id="turno" name="turno" required>
						          <option value="Manhã">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                   </select>
                  </div>
                  </div>
                  </div>
                   <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Sim, quero assinar</button>
                    </form></div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal"><?php echo $dados[2]['nome'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$<?php echo $dados[2]['valor_mensalidade'] ?><small class="text-muted fw-light">/mês</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
            <li>Aulas diárias</li>
              <li>Agendamento de aulas</li>
              <li>Pagamentos de R$<?php echo $dados[2]['periodicidade']*$dados[2]['valor_mensalidade']?> a cada <?php echo $dados[2]['periodicidade']?> meses</li>
              <li>À vista ou no cartão</li>
            </ul>
            <!-- Button trigger modal -->
			<button type="button" class="w-100 btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModal3">Assine</button>
			 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel3">Você realmente deseja assinar o plano <?php echo lcfirst($dados[2]['nome']) ?>?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                   <div class="row">
                   <div class="col-md-4 mb-3">
                   Escolha seu turno de preferência:
                   </div>
                   <div class="col-md-4 mb-3">
                   <form action="http://localhost/guararapesnatacao/aluno/assinar/<?php echo $dados[2]['id']?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                   <select class="custom-select d-block w-100" id="turno" name="turno" required>
						          <option value="Manhã">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                   </select>
                  </div>
                  </div>
                  </div>
                   <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Sim, quero assinar</button>
                    </form>
                   </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal"><?php echo $dados[3]['nome'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">R$<?php echo $dados[3]['valor_mensalidade'] ?><small class="text-muted fw-light">/mês</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
            <li>Aulas diárias</li>
              <li>Agendamento de aulas</li>
              <li>Pagamentos de R$<?php echo $dados[3]['periodicidade']*$dados[3]['valor_mensalidade']?> a cada <?php echo $dados[3]['periodicidade']?> meses</li>
              <li>À vista ou no cartão</li>
            </ul>
            <!-- Button trigger modal -->
			<button type="button" class="w-100 btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModal4">Assine</button>
			 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel4">Você realmente deseja assinar o plano <?php echo lcfirst($dados[3]['nome']) ?>?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                   <div class="row">
                   <div class="col-md-4 mb-3">
                   Escolha seu turno de preferência:
                   </div>
                   <div class="col-md-4 mb-3">
                   <form action="http://localhost/guararapesnatacao/aluno/assinar/<?php echo $dados[3]['id']?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                   <select class="custom-select d-block w-100" id="turno" name="turno" required>
						          <option value="Manhã">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                   </select>
                  </div>
                  </div>
                  </div>
                   <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Sim, quero assinar</button>
                    </form>
                   </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </main>
</div>
  </body>
  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>