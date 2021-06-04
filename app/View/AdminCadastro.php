
 <link href="http://localhost/guararapesnatacao/css/bootstrap.min.css" rel="stylesheet">
 <link href="http://localhost/guararapesnatacao/css/style/FormCadastro style.css" rel="stylesheet">

    
  </head>

  <body class="bg-light">
    <div class="container">
      <div class="py-4">
        <a href="http://localhost/guararapesnatacao/admin">
       <img class="rounded-circle" src="http://localhost/guararapesnatacao/css/style/imagens/Icon.png" alt="Generic placeholder image" width="65" height="65">
	     </a> 
       <br><br>
          <h2>Cadastro de funcionário</h2>
      </div>
	
      <form action="http://localhost/guararapesnatacao/admin/cadastrarfuncionario" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>  
        <div class="col-md-8 order-md-1">
          <div class="mb-3">
           <label for="Nome">Nome completo: </label>
              <input type="text" class="form-control" id="nome" maxlength="60" name="nome" placeholder="" value="" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "Nome completo" é obrigatório
                </div>
          </div>
			
          <div class="row"> 
          <div class="col-md-6 mb-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" maxlength="40" name="email" placeholder="eu@exemplo.com" required>
              <div class="invalid-feedback">
                O preenchimento do campo "Email" é obrigatório
              </div>
            </div>
			
			      <div class="col-md-6 mb-3">
              <label for="senha">Senha: </label>
              <input type="password" class="form-control" maxlength="20" id="senha" name="senha" required>
              <div class="invalid-feedback">
                O preenchimento do campo "Senha" é obrigatório
              </div>
            </div>
		    	</div>  

          <div class="row"> 
            <div class="col-md-6 mb-3">
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Selecione uma imagem</button>
			 
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Escolha sua foto de perfil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<div class="file-loading">
					  <input id="input-b9" name="fotoperfil" type="file" required>
					</div>
					<div id="kartik-file-errors"></div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				  </div>
				</div>
			  </div>
			</div>

			</div>
			</div>

			<div class="row">
			<div class="col-md-6 mb-6">
                <label for="telefone">Telefone: </label>
                <input type="tel" class="form-control" id="telefone" maxlength="15" name="telefone" placeholder="(81) 3123-4567" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "Telefone" é obrigatório
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="data_nascimento">Data de nascimento: </label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "Data de nascimento" é obrigatório
                </div>
              </div>
			 </div> 

             <div class="row">
              <div class="col-md-4 mb-3">
                <label for="CPF">CPF: </label>
                <input type="text" class="form-control" id="CPF" maxlength="18" name="CPF" onblur="return verificarCPF(this.value)" placeholder="123.456.789-10" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "CPF" é obrigatório
                </div>
              </div>
			  
			  <div class="col-md-4 mb-3">
                <label for="RG">RG: </label>
                <input type="text" class="form-control" id="RG" maxlength="15" name="RG" placeholder="1.234.567" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "RG" é obrigatório
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="CEP">CEP: </label>
                <input type="text" class="form-control" id="CEP" maxlength="9" name="CEP" onblur="pesquisacep(this.value);" placeholder="12345-678" required>
                <div class="invalid-feedback">
                  O preenchimento do campo "CEP" é obrigatório
                </div>
              </div>
			 </div>
       
              <div class="row">
                  <div class="col-md-6 mb-3">
                     <label for="funcao">Função: </label>
                     <input type="funcao" class="form-control" id="funcao" maxlength="32" name="funcao" placeholder="Ex.: Professor" required>
                     <div class="invalid-feedback">
                        O preenchimento do campo "Função" é obrigatório
                     </div>
                  </div>
                  <div class="col-md-6 mb-3">   
                          <label for="admin">Acesso ADMIN: </label>
                          <select class="custom-select d-block w-100" id="admin" name="admin" required>
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                          </select>
                  </div>
              </div>

            <div class="row">
                <div class="col-md-10 mb-3">
                <label for="rua">Rua: </label>
                <input type="text" class="form-control" id="rua" maxlength="120" name="rua" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Rua" é obrigatório
                </div>
                </div>

                <div class="col-md-2 mb-3">
                <label for="numero">Nº: </label>
                <input type="text" class="form-control" id="numero" maxlength="120" name="numero" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Número" é obrigatório
                </div>
                </div>
            </div>    

            <div class="row">
                <div class="col-md-5 mb-3">
                <label for="bairro">Bairro: </label>
                <input type="text" class="form-control" id="bairro" maxlength="120" name="bairro" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Bairro" é obrigatório
                </div>
                </div>

                <div class="col-md-5 mb-3">
                <label for="cidade">Cidade: </label>
                <input type="text" class="form-control" id="cidade" maxlength="120" name="cidade" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Cidade" é obrigatório
                </div>
                </div>

                <div class="col-md-2 mb-3">
                <label for="estado">Estado: </label>
                <input type="text" class="form-control" id="estado" maxlength="120" name="estado" required>
                <div class="invalid-feedback">
                    O preenchimento do campo "Estado" é obrigatório
                </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 mb-3">
                <label for="observacoes">Observações: </label>
                <textarea name="observacoes" rows="3" cols="40" maxlength="250" class="form-control" placeholder="Ex.: Contato de emergência"></textarea>
                <div class="invalid-feedback">
                    O preenchimento do campo "Observações" é obrigatório
                </div>
                </div>
            </div>
		
            <br><button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar cadastro</button>
            <br><br><br><br>
        </div>
	</form>
	  </div>
	  <script src="http://localhost/guararapesnatacao/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/guararapesnatacao/js/jquery-slim.min.js"><\/script>')</script>
    <script src="http://localhost/guararapesnatacao/js/popper.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/bootstrap.min.js"></script>
    <script src="http://localhost/guararapesnatacao/js/holder.min.js"></script>
    <script>
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');

          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
	
<script>
$(document).on('ready', function() {
    $("#input-b9").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png"]
        uploadUrl: 'upload/cliente'
    });
});
</script>

<script>
    function limpa_formulário_cep() {
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } 
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');

        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                document.body.appendChild(script);
            } 
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            limpa_formulário_cep();
        }
    };
    </script>

    <script>
        function limpa_formulário_cpf() {
           document.getElementById('CPF').value=("");
        }

    function verificarCPF(c){
      c = c.replace(/\D/g, '');
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        alert("CPF inválido!")
        limpa_formulário_cpf();
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert("CPF inválido!")
        limpa_formulário_cpf();
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        alert("CPF inválido!")
        limpa_formulário_cpf();
        v = true;
        return false;
    }
}
    </script>
			
  </body>
</html>