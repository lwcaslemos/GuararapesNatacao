<?php 
	$m = new Mensagem();

    $resultados = $m->selecionaMensagensNaoRespondidas();
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Mensagens não respondidas</h1>
    <p class="fs-4 text-muted">Buscar e responder mensagens pendentes de resposta</p>
  </div>
<body>

<?php if(empty($resultados)){ ?>
            <br><br>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oi <?php echo $_SESSION['nome'] ?></strong>, não localizamos nenhuma mensagem não respondida no momento.
            </div>
<?php   } 
else {
?>
			<div id="resultado">
			<table class="table table-bordered border-primary table-sm">
				<tr >	
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
                <th scope="col">Data de envio</th>
				<th scope="col">Texto</th> 
				<th scope="col"> </th> 
				</tr>	
			<?php 
			foreach ($resultados as $dado){ ?>
				<tr>
				<td ><?php echo $dado["nome_aluno"];?></td>
				<td ><?php echo $dado["email_aluno"];?></td>
                <td ><?php $data = new DateTime($dado["criacao_msg"]); echo $data->format('d/m/Y H:i:s');?></td>
				<td ><?php echo $dado["texto_msg"];?></td>
				<th scope="col">
					<a href="http://localhost/guararapesnatacao/admin/mensagemaluno/<?php echo $dado["id_aluno"];?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</a>
				</th> 
				</tr>
			<?php } ?>
			</table>
			</div>
		</div>
	</div>
</body>

<?php   }
?>

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>