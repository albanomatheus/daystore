<?php
	require "functions.php";
	include "_back/db/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-BOUGHT</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/scripts.js"></script>
</head>
<body>
	<div class="main">
	<?php
		include "pages/menu.php";
			echo "<div class='container'>"; // div que conterá as páginas ou os adesivos que serão incluídos na pagina
			try {
				require load(); // Função que retornará um diretório caso ele exista, se não existir ocorrerá um erro
			} catch (Exception $e) {
				listStk($conn); // Caso o erro for lançado, significa que o usuário pode estar tentando visualizar os adesivos de derterminada categoria. A funçao loadStk($conn) é responsável por isso.
			}
			echo "</div>";
	?>
	</div>
</body>
</html>

<?php mysqli_close($conn); ?>
