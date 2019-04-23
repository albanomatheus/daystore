<div class="title"><h1>Cadastrar</h1></div>
<form action="_back/validation/user.php?key=sign" method="post">
	<label>Nome:</label>
	<input type="text" name="name">
	<label>Senha:</label>
	<input type="password" name="pass">
	<button name="sign" class='bt_form'>Cadastrar</button>
</form>	

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>