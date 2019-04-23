<?php
	$msg = '';
	$key = '';
	if (!isset($_SESSION)) {
		session_start();
	}
	if (isset($_SESSION['user']) && isset($_GET['num'])) {
		if ($_SESSION['user_key'] == $_GET['num']) {
			$msg = "Bem vindo " . $_SESSION['user'];
			$key = $_GET['num'];
		}
	}
?>
<header>
<table style="width: 100%; table-layout: fixed; height: 120px;" border="0">
	<tr>
		<td><a href="<?php echo "?page=home&num={$key}"; ?>"><img src="assets/img/logo.png" width="100" height="100"></a></td>
		<td align="center">
			<a href="<?php echo "?page=cart&num={$key}"; ?>"><img src="assets/img/cart.png" width="50" height="50"></a><br><br>
			<?php if (!empty($msg)): ?>
				<span><?php echo $msg; ?></span>
			<?php else: ?>
		        <a href="<?php echo "?page=admin&num={$key}"; ?>"><button class="searchButton">Entrar como Adm</button></a>
				<a href="<?php echo "?page=login&num={$key}"; ?>"><button class="searchButton">Entrar</button></a>
		        <a href="<?php echo "?page=sign&num={$key}"; ?>"><button class="searchButton">Criar uma Conta</button></a>
			<?php endif; ?>
		</td>
		<td align="right">
			<form method="GET">
    			<input type="hidden" name="page" value="find">
    			<input type="hidden" name="num" value="<?php echo $key; ?>">
				<input type="texto" id="searchText" name="tag" placeholder="Buscar..."/>
	    		<button class="searchButton" style="width: 211px;">Buscar</button>
    		</form>
		</td>
	</tr>
</table>
</header>
<div id = "menu">
    <ul>
	  <a href="<?php echo "?page=home&num={$key}"; ?>"><li>Todos</li></a>
	  <a href="<?php echo "?page=developers&num={$key}"; ?>"><li>Desenvolvimento</li></a>
	  <a href="<?php echo "?page=musica&num={$key}"; ?>"><li>Música</li></a>
	  <a href="<?php echo "?page=emojis&num={$key}"; ?>"><li>Emojis</li></a>
	  <a href="<?php echo "?page=games&num={$key}"; ?>"><li>Jogos</li></a>
      <a href="<?php echo "?page=beer&num={$key}"; ?>"><li>Cerveja</li></a>
      <?php if (!empty($msg)): ?>
      	<a onclick="logout()"><li>Sair</li></a>
      <?php endif ?>
    </ul>
</div>
