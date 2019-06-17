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
            <label>CEP:</label><br>
            <input type="text" class="form-control" style="display: inline; width: 80%" id="endereco"  name="adress">
            <button type="button" class="btn btn-primary" onclick="getAddress(document.getElementById('endereco').value)">Procurar</button>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2">
            <label>Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="city">
        </div>

        <div class="form-group col-md-6">
            <label>Rua:</label>
            <input type="text" class="form-control" id="rua" name="street">
        </div>

        <div class="form-group col-md-3">
            <label>Bairro:</label>
            <input type="text" class="form-control" id="bairro"  name="block">
        </div>

        <div class="form-group col-md-1">
            <label>Numero:</label>
            <input type="number" class="form-control" id="numero"  name="number">
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