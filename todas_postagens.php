<?php
   require 'regra.php';
   $acao = 'recuperar';
   require 'post_controller.php';
  
   
  
 

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UNIRIO</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
        <script>
		 
			 function excluir(id){
				 let form = document.createElement('form');
				 form.action = 'post_controller.php?acao=remover'
				 form.method = 'post'

				 let inputDel = document.createElement('input')
				 inputDel.type = 'hidden'
				 inputDel.name = 'id'
				 inputDel.value = id

				 form.appendChild(inputDel)

				 document.getElementById("id_exclui").value = id

				 console.log(form);
			 }


			 function editar(id, txt_title, txt_content){
				let form = document.createElement('form')
				form.action = 'post_controller.php?acao=atualizar'
				form.method = 'post'
				let inputTitle = document.createElement('input')
				inputTitle.type = 'text'
				inputTitle.name = 'title'
				inputTitle.className = 'form-control'
				inputTitle.value = txt_title

				let inputContent = document.createElement('textarea')
				inputContent.type = 'text'
				inputContent.name = 'content'
				inputContent.className = 'col-12 form-control'
				inputContent.value = txt_content
                
                let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'btn btn-info'
				button.innerHTML = 'Atualizar'

				form.appendChild(inputTitle)
				form.appendChild(inputContent)
				form.appendChild(inputId)
				form.appendChild(button)

				let title = document.getElementById('title_'+id)
				let content = document.getElementById('content_'+id)
				
				title.innerHTML = ''
				content.innerHTML = ''

				title.insertBefore(form, title[0])
				content.insertBefore(form, content[0])

				console.log(form)
			
			 }

			 function publicar(id){
				 let form = document.createElement('form');
				 form.action = 'post_controller.php?acao=publicar'
				 form.method = 'post'

				 var data = new Date();
				 var dia   = data.getDate()
				 var mes     = data.getMonth()
				 var ano4    = data.getFullYear()
				 var hora = data.getHours()
				 var minutos = data.getMinutes()
				 var segundos = data.getSeconds()
				 var str_data = ano4 + '-' + (mes+1) + '-' + dia;
				
				 var resultado = hora + ':' + minutos + ':' + segundos
                 var final = str_data + ' ' + resultado;
				 let inputId = document.createElement('input')
				 inputId.type = 'hidden'
				 inputId.name = 'id'
				 inputId.value = id

				 let inputHora = document.createElement('input')
				 inputHora.type = 'hidden'
				 inputHora.name = 'hora'
				 inputHora.value = final
				 form.appendChild(inputId)
				 form.appendChild(inputHora)
				 console.log(form);

				 document.getElementById("id_publica").value = id
				 document.getElementById("hora_publica").value = resultado
			 }
		 </script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					UNIRIO
				</a>
				<a class="navbar-nav ml-auto" href="sair.php">
					Sair
				</a>
			
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Postagens publicadas</a></li>
						<li class="list-group-item"><a href="nova_postagem.php">Nova postagem</a></li>
						<li class="list-group-item active"><a href="#">Todas as postagens</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas as postagens</h4>
								<hr />
						 
							
							<div class="row mb-3 d-flex align-items-center tarefa text-center">

									<?php foreach($posts as $indice => $post){ ?>
									<div class="card text-center mb-3" style="width: 1000px;">
										<div class="card-header">
											Id: <?=$post->id ?>
										</div>
										<div class="card-body">
											<h5 class="card-title"  id="title_<?=$post->id?>"><?=$post->title ?></h5>
											<p class="card-text" id="content_<?=$post->id?>"><?=$post->content?></p>
										</div>
										<div class="card-footer text-muted">
											<div>
												<i class="fas fa-trash-alt fa-lg text-danger" data-toggle="modal" data-target="#modalExclusao" onclick="excluir(<?=$post->id?>)" title="Excluir"></i>
												<i class="fas fa-edit fa-lg text-info" onclick="editar(<?=$post->id?>, '<?=$post->title?>', '<?=$post->content?>')" title="Editar"></i>
												<i class="fas fa-check-square fa-lg text-success"  data-toggle="modal" data-target="#exampleModal" onclick="publicar(<?=$post->id?>)" title="Publicar"></i>
											</div>
										</div>
									</div>
									<?php } ?>
								
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal exclusão -->
		<div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form action="post_controller.php?acao=remover" method="post">
						<div class="modal-body">
							Você realmente deseja excluir a postagem?
							<input type="hidden" id="id_exclui" name="id" value="" class="form-control">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
							<button type="submit" class="btn btn-success">Sim</button>
					</form>
						</div>
				</div>
			</div>
		</div>

		<!-- Modal publicação -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form action="post_controller.php?acao=publicar" method="post">
						<div class="modal-body">
							Você realmente deseja realizar a publicação na plataforma wordpress?
							<input type="hidden" id="id_publica" name="id" value="" class="form-control">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
							<button type="submit" class="btn btn-success">Sim</button>
					</form>
						</div>
				</div>
			</div>
		</div>
   

	</body>
</html>