<?php
// Essa página vai receber requisições de paginas referentes ao usuário, cada requisição terá que contar uma chave para ser identificada (ex: "sign=1", "login=1") dentro do array $_GET
// De acordo com a chave, será identificado qual serviço a pagina terá que executar
require "../db/connection.php";
require "../functions/custom.php";

session_start();

if ($_GET['key'] == "sign") {
    if (insert($conn, "user",
        '[{
                "name":"' . $_POST['name'] . '",
                "password":"' . $_POST['pass'] . '",
                "cpf":"' . $_POST['cpf'] . '",
                "email":"' . $_POST['email'] . '",
                "address":"' . $_POST['street'] . ", " . $_POST['number'] . " - " . $_POST['city'] .'",
                "phone":"' . $_POST['phone'] . '",
                "birth":"' . $_POST['birth'] . '",
                "job":"' . $_POST['job'] . '"
               }]')) {
        header("location:/daystore/?page=sign&men=success");
    } else {
        header("location:/daystore/?page=sign&men=fail");
    }
}

if ($_GET['key'] == "login") {
    if ($user = select($conn, "user", 'name="' . $_POST['name'] . '" && password="' . $_POST['pass'] . '"')) {
        $num = uniqid();
        $_SESSION['user'] = $user[0]['name'];
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['user_key'] = $num;
        header("location:/daystore/?page=home&num=$num");
    } else {
        header("location:/daystore/?page=login&men=fail");
    }
}

if ($_GET['key'] == "logout") {
    session_destroy();
}

if ($_GET['key'] == "addToCart") {
    echo setcookie("cart", $_COOKIE["cart"] . $_POST['item'] . "%", time() + (86400 * 30), "/") ? "1" : "0";
}

if ($_GET['key'] == "rmFromCart") {
    $cart = preg_replace("/" . $_POST['item'] . "%" . "/", '', trim($_COOKIE['cart']), 1);
    echo setcookie("cart", $cart, time() + (86400 * 30), "/") ? "1" : "0";
}
if ($_GET['key'] == "address") {
    $result = select($conn, 'address', "postal_code = '" . $_GET['postalCode'] . "'");

    echo json_encode($result[0]);
}

mysqli_close($conn);