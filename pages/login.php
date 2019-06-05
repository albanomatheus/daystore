<div class="title"><h1>Login</h1></div>
<form action="_back/validation/user.php?key=login" method="post">
	<label>Usuario:</label>
	<input type="text" name="name">
	<label>Senha:</label>
	<input type="password" name="pass">
	<button class='bt_form'>Entrar</button>
</form>

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>
