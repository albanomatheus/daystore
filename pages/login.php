<div class="title"><h1>Login</h1></div>

<form action="_back/validation/user.php?key=login" method="post">

    <div class="row">
        <div class="form-group col-md-6">
            <label>Usuario:</label>
            <input type="text" class="form-control" id="nome" name="name">
        </div>

        <div class="form-group col-md-6">
            <label>Senha:</label>
            <input type="password" class="form-control" id="pass"  name="pass">
        </div>
    </div>
    <button class='bt_form'>Entrar</button>
</form>

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>