<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?>">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Projeto</title>
</head>

<body>
	<div class="container">

		<?php if ($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>

		<?php if ($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

		<?php if ($this->session->userdata("usuario_logado")) : ?>

			<h1>Produtos</h1>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="">
					<div class="navbar-nav">
					<?= anchor("produtos/index", "Inicio", array("class" => "btn btn-primary")) ?>
					</div>
				</div>
			</nav>

			<div class="form-group input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			<input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
			</div>

			<table class="table" id=tabela>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Opções</th>
				</tr>
				<?php foreach ($produtos as $produto) : ?>
					<tr>
						<td><?= $produto['nome'] ?></td>
						<td><?= $produto['descricao'] ?></td>
						<td>R$ <?= $produto['preco'] ?></td>
						<td>
							<?= anchor("produtos/ativar/{$produto['id']}", "Ativar", array("class" => "btn btn-primary")) ?>
						</td>
					</tr>
				<?php endforeach ?>
			</table>

			<script>
            	$('input#txt_consulta').quicksearch('table#tabela tbody tr');
        	</script>

			<?= anchor("produtos/index", "Voltar", array('class' => 'btn btn-primary')); ?>
		
		<?php endif ?>


	</div>
</body>

</html>