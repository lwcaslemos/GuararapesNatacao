<main role="main" class="container" >
<body>

<?php 
    $agend = new Agendamento();
    $plan = new Plano();
        
    $planoativo = $plan->selecionaPlanoAtivo($_SESSION['id']);

    if(!empty($planoativo)){
        $agendamento = $agend->listaAgendamentos($planoativo[0]['id']);
    }
?>

<?php if(empty($planoativo)){ ?>
    <br><br>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, você não possui plano ativo. Para agendar, favor realize o pagamento para ativar seu plano atual. Caso não possua um plano, <a href="http://localhost/guararapesnatacao/aluno/assine">assine!</a>
    </div>  
<?php } 
    else if(!empty($planoativo)){ 
        if(empty($agendamento)){ ?>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Seus agendamentos</h1>
    <p class="fs-4 text-muted">Agendamentos de aulas referentes ao seu plano atual</p>
  </div>

	<form action="http://localhost/guararapesnatacao/aluno/agendarAula" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-1">
          <label for="data_agendamento">Data do agendamento: </label>
          <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" required>
             <div class="invalid-feedback">
                O preenchimento do campo "Data do agendamento" é obrigatório
             </div>
        </div>

        <div class="col-md-4 order-md-1">
          <label for="hora_agendamento">Hora do agendamento: </label>
          <select class="custom-select d-block w-100" id="hora_agendamento" name="hora_agendamento" required>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
          </select>
        </div>
      </div>
      </div>

      <div class="row">
        <div class="col-md-2 order-md-1">
          <input type="hidden" name='plano_comprado_id' value="<?php echo $planoativo[0]['id']?>">
          <button class="btn btn-primary btn-sm btn-block" type="submit">Agendar</button>
        </div>
      </div> 
  </form>
  <br><br><br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, você não tem nenhum agendamento no momento.
            </div>
<?php   } 
        else{ 
?>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Seus agendamentos</h1>
    <p class="fs-4 text-muted">Agendamentos de aulas referentes ao seu plano atual</p>
  </div>

	<form action="http://localhost/guararapesnatacao/aluno/agendarAula" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-1">
          <label for="data_agendamento">Data do agendamento: </label>
          <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" required>
             <div class="invalid-feedback">
                O preenchimento do campo "Data do agendamento" é obrigatório
             </div>
        </div>

        <div class="col-md-4 order-md-1">
          <label for="hora_agendamento">Hora do agendamento: </label>
          <select class="custom-select d-block w-100" id="hora_agendamento" name="hora_agendamento" required>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
          </select>
        </div>
      </div>
      </div>

      <div class="row">
        <div class="col-md-2 order-md-1">
          <input type="hidden" name='plano_comprado_id' value="<?php echo $planoativo[0]['id']?>">
          <button class="btn btn-primary btn-sm btn-block" type="submit">Agendar</button>
        </div>
      </div> 
  </form>
  <br><br><br>
  <table class="table table-bordered border-primary table-sm">
        <tr >	
          <th scope="col">Plano</th>
          <th scope="col">Data agendamento</th>
          <th scope="col">Hora agendamento</th>
          <th scope="col"> </th>		  
          <th scope="col"> </th>		  
        </tr>	
      <?php 
      foreach ($agendamento as $dado){ ?>
        <tr>
          <td ><?php echo $dado["nome_plano"];?></td>
          <td ><?php $data = new DateTime($dado["data"]); echo $data->format('d/m/Y');?></td>
          <td ><?php echo $dado["hora"];?></td>
          <td >
            <a href="http://localhost/guararapesnatacao/aluno/alteraAgendamento" data-toggle="modal" data-target="#exampleModal<?php echo $dado["id"];?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg>
            </a>

            <div class="modal fade" id="exampleModal<?php echo $dado["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $dado["id"];?>" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel<?php echo $dado["id"];?>">Altere seu agendamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div class="file-loading">
          <form action="http://localhost/guararapesnatacao/aluno/alteraAgendamento" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-1">
          <label for="data_alt">Data do agendamento: </label>
          <input type="date" class="form-control" id="data_alt" name="data_alt" required>
             <div class="invalid-feedback">
                O preenchimento do campo "Data do agendamento" é obrigatório
             </div>
        </div>

        <div class="col-md-4 order-md-1">
          <label for="hora_alt">Hora do agendamento: </label>
          <select class="custom-select d-block w-100" id="hora_alt" name="hora_alt" required>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
          </select>

          <input type="hidden" name='id_alt' value="<?php echo $dado["id"];?>"> 
					
          </div>
				  </div>
          </div>
				  <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Alterar</button>
				  </div>
				</div>
			  </div>
      </form>
			</div>
			</div>

          </td>
          <td >
            <a href="http://localhost/guararapesnatacao/aluno/removeAgendamento/<?php echo $dado["id"];?>" onclick="return confirm('Seu agendamento será excluído. Deseja continuar?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            </a>
          </td>
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