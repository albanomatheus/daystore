<?php
	// Essa página vai receber requisições de paginas referentes ao admin, cada requisição terá que contar uma chave para ser identificada (ex: "upload=1") dentro do array $_GET
	// De acordo com a chave, será identificado qual serviço a pagina terá que executar
	require "../db/sql_functions.php";
	require "../db/connection.php";
	require '../functions/custom.php';

	session_start();
	
	if ($_GET['key'] == "admin") {
		if($admin = select($conn, "admins", 'username="'.$_POST['name'].'" && password="'.$_POST['pass'].'"')){
			unset($_SESSION['user']);
			$num = uniqid();
			$_SESSION['admin'] = $admin[0]['username'];
			$_SESSION['admin_id'] = $num;
			header("location:/ebought/?page=admin&num=$num&cod=1");
		} else {
			header("location:/ebought/?page=admin&men=fail");
		}
	}

	if (isset($_FILES['img']) && $_GET['key'] == "upload") {
		$num = $_SESSION['admin_id'];
		$extension = strrchr($_FILES['img']['name'], '.');
		$new_name = uniqid() . $extension;
		$dir = "../../assets/img/";
		$obj =  '[{"name":"'.$new_name.'", "cat":"'.$_POST['cat'].'", "price":'.$_POST['price'].', "tags":"'.$_POST['tag'].'"}]';
		if (move_uploaded_file($_FILES['img']['tmp_name'], $dir.$new_name) and insert($conn, "ads", $obj)) {
			header("location:/ebought/?page=admin&num=$num&men=success&cod=1");
		} else {
			header("location:/ebought/?page=admin&num=$num&men=fail&cod=1");
		}
	}

	if ($_GET['key'] == "del") {
		var_dump($_POST);
		if (isset($_SESSION['admin']) and isset($_SESSION['admin_id'])) {
			if (isset($_POST['name'])) {
				shell_exec("rm ../../assets/img/".$_POST['name']);
				$item = $_POST['name']."\n";
				$conn->query("UPDATE user SET cart=replace(cart, '{$item}', '')");
			}
			echo (delete($conn, $_POST['table'], $_POST['id'])) ? "1" : "0";
		} else {
			echo "-1";
		}
	}

	mysqli_close($conn);
