<?php
  
   require 'regra.php';
   //echo date('Y-m-d  H:i:s');
   
   
  
 

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
		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	    <div class="bg-success pt-2 text-white d-flex justify-content-center">
		<h5>Postagem criada com sucesso</h5>	
       </div>
	   <?php } ?>
		

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Postagens publicadas</a></li>
						<li class="list-group-item active"><a href="#">Nova postagem</a></li>
						<li class="list-group-item"><a href="todas_postagens.php">Todas as postagens</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova postagem</h4>
								<hr />

								<form method="post" action="post_controller.php?acao=inserir" enctype="multipart/form-data">
									<div class="form-group">
										<label>Título da postagem:</label>
										<input type="text" class="form-control" name="title" placeholder="Digite o título da postagem" required>
									</div>
									<div class="form-group">
										<label>Conteúdo da postagem </label>
										<textarea name="content"  class="form-control" id="" cols="30" rows="10"  placeholder="Digite o conteúdo da postagem" required></textarea>
									</div>
									<div class="form-group">
										<label>Insira uma imagem para a postagem (opcional) </label>
										<input type="file" name="foto" class="form-control">
									</div>
									<button class="btn btn-success">Salvar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>