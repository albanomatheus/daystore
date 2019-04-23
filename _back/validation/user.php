<?php
	// Essa página vai receber requisições de paginas referentes ao usuário, cada requisição terá que contar uma chave para ser identificada (ex: "sign=1", "login=1") dentro do array $_GET
	// De acordo com a chave, será identificado qual serviço a pagina terá que executar
	require "../db/sql_functions.php";
	require "../db/connection.php";
	require '../functions/custom.php';

	session_start();

	if ($_GET['key'] == "sign") {
		if (insert($conn, "user", '[{"name":"'.$_POST['name'].'", "password":"'.$_POST['pass'].'"}]')) {
			header("location:/ebought/?page=sign&men=success");
		} else {
			header("location:/ebought/?page=sign&men=fail");
		}
	}

	if ($_GET['key'] == "login") {
		if($user = select($conn, "user", 'name="'.$_POST['name'].'" && password="'.$_POST['pass'].'"')){
			$num = uniqid();
			$_SESSION['user'] = $user[0]['name'];
			$_SESSION['user_id'] = $user[0]['id'];
			$_SESSION['user_key'] = $num;
			header("location:/ebought/?page=home&num=$num");
		} else {
			header("location:/ebought/?page=login&men=fail");
		}
	}

	if ($_GET['key'] == "logout") {
		session_unset($_SESSION);
	}

	if ($_GET['key'] == "addToCart") {
		if (isset($_SESSION['user_id']) and isset($_SESSION['user_key'])) {
			$user = select($conn, "user", "id=".$_SESSION['user_id']);
			$cart = $user[0]['cart'].$_POST['item']."\n";
			$sql = "UPDATE user SET cart='{$cart}' WHERE id={$_SESSION['user_id']}";
			echo (mysqli_query($conn, $sql)) ? "1" : "0";
		} else {
			echo "-1";
		}
	}

	if ($_GET['key'] == "rmFromCart") {
		if (isset($_SESSION['user_id']) and isset($_SESSION['user_key'])) {
			$user = select($conn, "user", "id=".$_SESSION['user_id']);
			$cart =	preg_replace("/".$_POST['item']."\n"."/", '', $user[0]['cart'], 1);
			$sql = "UPDATE user SET cart='{$cart}' WHERE id={$_SESSION['user_id']}";
			echo (mysqli_query($conn, $sql)) ? "1" : "0";
		} else {
			echo "-1";
		}
	}

	mysqli_close($conn);