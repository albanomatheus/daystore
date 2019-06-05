<div class="title"><h1>Cadastrar</h1></div>
<form action="_back/validation/user.php?key=sign" method="post">
	<label>Nome:</label>
	<input type="text" name="name">
	<label>Senha:</label>
	<input type="password" name="pass">
    <label>CPF:</label>
    <input type="text" name="cpf">
    <label>E-mail:</label>
    <input type="text" name="email">
    <label>Endereço:</label>
    <input type="text" name="adress">
    <label>Telefone:</label>
    <input type="text" name="phone">
    <label>Nascimento:</label>
    <input type="text" name="birth">
    <label>Profissão:</label>
    <input type="text" name="job">
	<button name="sign" class='bt_form'>Cadastrar</button>
</form>	

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>