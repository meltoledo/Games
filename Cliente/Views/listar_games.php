<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Lista de Games</title>
	</head>
	
	<body>
		<h1>Lista de Games</h1>
		
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Id Console</th>
			</tr>
			
			<?php
				foreach($retorno as $dado)
				{
					echo "<tr>
							<td>{$dado->idgame}</td>
							<td>{$dado->nome}</td>
							<td>{$dado->console_idconsole}</td>
						  </tr>";
				}
			?>
		</table>

		<br><br>
	
		<a href="index.php?controle=gamesController&metodo=cadastrar">Cadastrar Games</a>
		
	</body>

</html>