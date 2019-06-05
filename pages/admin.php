<div class="title"><h1>Página do administrador</h1></div>
<?php if (!isset($_GET['cod'])): ?>
	<form action="_back/validation/admin.php?key=admin" method="post">
		<label>Usuario:</label>
		<input type="text" name="name">
		<label>Senha:</label>
		<input type="password" name="pass">
		<button class='bt_form'>Entrar</button>
	</form>
<?php elseif (isset($_GET['cod']) and $_SESSION['admin_id'] == $_GET['num']): ?>
	<a href="<?php echo "?page=admin&num={$_GET['num']}&cod=1"; ?>"><button class='searchButton' style="width: 33%; margin-bottom: 5px; font-size: 18px;">Upload</button></a>
	<a href="<?php echo "?page=admin&num={$_GET['num']}&cod=2"; ?>"><button class='searchButton' style="width: 33%; margin-bottom: 5px; font-size: 18px;">Usuários</button></a>
	<a href="<?php echo "?page=admin&num={$_GET['num']}&cod=3"; ?>"><button class='searchButton' style="width: 33%; margin-bottom: 5px; font-size: 18px;">Deletar</button></a>

	<?php if ($_GET['cod'] == "1"): ?>
		<form action="_back/validation/admin.php?key=upload" method="post" enctype="multipart/form-data">
			<label>Arquivo:</label>
			<input type="file" name="img" style="padding: 5px; border: 0px; margin-bottom: 5px">	
			<label>Categoria:</label>
			<select name="cat">
				<option value="beer">Cerveja</option>
				<option value="developers">Desenvolvedor</option>
				<option value="emojis">Emojis</option>
				<option value="games">Jogos</option>
				<option value="musica">Musica</option>
			</select>	
			<label>Preço:</label>
			<input type="number" name="price" step=".01" placeholder="EX: 2.50">
			<label>Tag:</label>
			<input type="text" name="tag" placeholder="Insira palavras para a busca">
			<button class='bt_form'>Salvar</button>	
		</form>
	<?php endif ?>

	<?php if ($_GET['cod'] == "2"): ?>
		<?php
			if ($users = select($conn, "user", "1")) {
				foreach ($users as $key => $value) {
					echo "<table class='user'>
								<tr>
									<td><label>ID: </label>".$value["id"]."</td>
									<td width='380'><label>Nome de usuário: </label>".$value["name"]."</td>
									<td width='200'><label>Senha: </label>".$value["password"]."</td>
									<td><button type='button' onclick='del(\"user\", \"{$value["id"]}\")' class='searchButton' style='width: 35px; padding: 5px;'>X</button></td>
								</tr>	
						  </table>";
				}
			}
		?>
	<?php endif ?>
		
	<?php if ($_GET['cod'] == "3"): ?>
		<?php 
			if ($imgs = select($conn, "ads", "1")) {
				$n = count($imgs);
				echo "<div>";
				for ($i=0; $i<$n; $i++) {
					echo "<table class='ads' style='margin:10px 3px 5px 0px; width:33%'>";
					echo "<tr><td><img src='assets/img/".$imgs[$i]['name']."' width='250px' height='250px'></td></tr>";
					echo "<tr><td><span>R$ ".$imgs[$i]['price']."</span></td></tr>";
					echo "<tr><td><button class='cartButton' onclick='del(\"ads\", \"".$imgs[$i]['id']."\", \"".$imgs[$i]['name']."\")' style='background-color: red;'>Remover</button></td></tr>";
					echo "</table>";
				}
				echo "</div>";
			}
		 ?>
	<?php endif ?>

<?php endif; ?>

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>
