<div class="title"><h1>Cadastrar</h1></div>

<form action="_back/validation/user.php?key=sign" method="post">

    <div class="row">
        <div class="form-group col-md-4">
            <label>Nome:</label>
            <input type="text" class="form-control" id="nome" name="name">
        </div>

        <div class="form-group col-md-4">
            <label>Senha:</label>
            <input type="password" class="form-control" id="pass"  name="pass">
        </div>

        <div class="form-group col-md-4">
            <label>CPF:</label>
            <input type="text" class="form-control" id="cpf"  name="cpf">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label>E-mail:</label>
            <input type="text" class="form-control" id="email"  name="email">
        </div>

        <div class="form-group col-md-6">
            <label>Endereço:</label>
            <input type="text" class="form-control" id="adress"  name="adress">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label>Telefone:</label>
            <input type="text" class="form-control" id="phone"  name="phone">
        </div>

        <div class="form-group col-md-4">
            <label>Nascimento:</label>
            <input type="date" class="form-control" id="birth"  name="birth">
        </div>

        <div class="form-group col-md-4"">
        <label>Profissão:</label>
        <input type="text" class="form-control" id="job"  name="job">
    </div>
    </div>
    <button name="sign" class='bt_form'>Cadastrar</button>
</form>

<?php if (isset($_GET['men'])) echo $_GET['men']; ?>