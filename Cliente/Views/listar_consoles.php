<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Consoles</title>
	</head>
	
	<body>
		<form action="#" method="post">
			<label>Escolha um console</label>
			<select name="console">
				<?php
					if(is_array($retorno))
					{
						foreach($retorno as $dado)
						{
							echo "<option value='{$dado->idconsole}'>{$dado->descricao}</option>";
						}
					}
				?>
			</select>
			<br><br>
			<input type="submit">
		</form>
	</body>

</html>