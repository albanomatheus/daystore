<?php
require "_back/functions/custom.php";
include "_back/db/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-BOUGHT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/lib/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
