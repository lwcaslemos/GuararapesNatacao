<?php 
	$a = new Aluno();

	if(isset($_POST['buscar'])){
		$busca = $_POST['buscar'];

		$resultados = $a->consultarAlunoSemPlanoPorNome($busca);
	}
	else{
		$resultados = $a->consultarAlunoSemPlanoAll();
	}
?>

<div class="container py-3">
  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <br><br>
    <h1 class="display-5 fw-normal">Assinar planos</h1>
    <p class="fs-4 text-muted">Alunos que não possuem plano válido atualmente</p>
  </div>
<body>
	<div class="container topo">
		<div class="form-group">
			<div class="input-group">
			<form action="http://localhost/guararapesnatacao/admin/assinaplano" class="w-100 me-3" method="post">
				<input type="search" name="buscar" id="buscar" placeholder="Digite o nome" class="form-control" />
			</form>
			</div>
		</div>
		<div>
			<div id="resultado">
			<table class="table table-bordered border-primary table-sm">
				<tr >	
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">CPF</th> 
				<th scope="col"> </th> 
				</tr>	
			<?php 
			foreach ($resultados as $dado){ ?>
				<tr>
				<td ><?php echo $dado["nome_aluno"];?></td>
				<td ><?php echo $dado["email_aluno"];?></td>
				<td ><?php echo $dado["cpf_aluno"];?></td>
				<th scope="col">
					<a href="http://localhost/guararapesnatacao/admin/selecionaplanoaluno/<?php echo $dado["id_aluno"];?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
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

<script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>