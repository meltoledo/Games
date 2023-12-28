<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Cadastrar Games</title>
    </head>

    <body>
        <h1>Cadastrar Games</h1>

        <form action="#" method="post">

            <label for="nome">Nome:</label>
            <input type="string" name="nome" /> <br><br>

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
            <input type="submit" value="Inserir" /> <br><br>

        </form>
    </body>
</html>