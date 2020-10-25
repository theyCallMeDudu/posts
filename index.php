<?php
   require 'regra.php'; 
   $acao = 'recuperarPublica';
   require 'post_controller.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Unirio</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Postagens publicadas</a></li>
						<li class="list-group-item"><a href="nova_postagem.php">Nova postagem</a></li>
						<li class="list-group-item"><a href="todas_postagens.php">Todas as postagens</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Postagens publicadas</h4>
								<hr />

							<table class="table table-bordered table-striped">
								<thead>
								
									<tr>
										<th>Título</th>
										<th>Conteúdo</th>
										<th>Data/Hora - publicação</th>
									</tr>
									<tbody>
									<?php foreach($posts as $indice => $post){ ?>
										<tr>

											<td><?=$post->title?></td>
											<td><?=$post->content?></td>
											<td><?=$post->manipulador?></td>
										</tr>
										<?php } ?>
									</tbody>
								</thead>
							</table>

							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>