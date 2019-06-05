<div class="title"><h1>Seu carrinho</h1></div>

<?php
$arr = loadCart($conn, $_SESSION['user_id']);
echo "<div class='total'>Total R$: " . $arr['price'] . "</div>";
echo "<button class='total_bt'>Comprar</button>";
echo $arr['cart'];
?>
